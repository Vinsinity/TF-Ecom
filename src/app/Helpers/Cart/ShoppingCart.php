<?php

namespace App\Helpers\Cart;

use App\Helpers\Cart\Contracts\Buyable;
use App\Helpers\Cart\Enums\CostType;
use App\Helpers\Cart\Exceptions\CartAlreadyStoredException;
use App\Helpers\Cart\Exceptions\InvalidRowIDException;
use App\Helpers\Cart\Exceptions\UnknownModelException;
use App\Models\Cargo;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Database\Connection;
use Illuminate\Database\DatabaseManager;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Collection;
use stdClass;

class ShoppingCart {

    const DEFAULT_INSTANCE = 'default';

    /**
     * Instance of the session manager.
     */
    private SessionManager $session;

    /**
     * Instance of the event dispatcher.
     */
    private Dispatcher $events;

    /**
     * Holds the current cart instance.
     */
    private string $instance;

    /**
     * Holds the extra additional costs on the cart
     */
    private Collection $extraCosts;

    /**
     * Cart constructor.
     */
    public function __construct(SessionManager $session, Dispatcher $events)
    {
        $this->session = $session;
        $this->events = $events;
        $this->extraCosts = new Collection();

        $this->instance(self::DEFAULT_INSTANCE);
    }

    /**
     * Set the current cart instance.
     */
    public function instance(?string $instance = null): ShoppingCart
    {
        $instance = $instance ?: self::DEFAULT_INSTANCE;

        $this->instance = sprintf('%s.%s', 'cart', $instance);

        return $this;
    }

    /**
     * Get the current cart instance.
     */
    public function currentInstance(): string
    {
        return str_replace('cart.', '', $this->instance);
    }

    /**
     * Add an item to the cart.
     *
     * @param array|Buyable|int|string $id
     * @param mixed $name
     * @param int|float|null $qty
     * @param ?float $price
     *
     * @return ShoppingCartItem|ShoppingCartItem[]
     */
    public function add($id, string $image, $name = null, $qty = null, $price = null, array $options = [])
    {
        if ($this->isMulti($id)) {
            return array_map(function ($item) {
                return $this->add($item);
            }, $id);
        }

        $cartItem = $this->createCartItem($id, $image,$name, $qty, $price,  $options);

//        $content = $this->getContent();
        $content = $this->getContentItems();

//        dd($content->get('items'));
//        $items = $content->get('items');

//        dd($content->get('items'),$cartItem);
        if ($content->get('items')->has($cartItem->rowId)) {
            $cartItem->qty += $content->get('items')->get($cartItem->rowId)->qty;
        }

        $content->get('items')->put($cartItem->rowId, $cartItem);

//        dd($content);

        $this->events->dispatch('cart.added', $cartItem);

        $this->session->put($this->instance, $content);

        return $cartItem;
    }

    /**
     * Add coupon in to the cart.
     *
     * @param $id
     * @param string $name
     * @param $amount
     * @param $type
     * @return Collection
     */
    public function addCoupon($id, string $name, $code, $amount, $type): Collection
    {
        $content = $this->getContentItems();

        $coupon = (object) [
            'id' => $id,
            'name' => $name,
            'code' => $code,
            'amount' => $amount,
            'type' => $type,
        ];

        $total = $content->get('items')->reduce(function ($total, ShoppingCartItem $cartItem) {
            return $total + ($cartItem->qty * $cartItem->priceTax);
        }, 0);

        switch ($coupon->type) {
            case 'percentage':
                $percent = $total / $coupon->amount;
                $coupon->price = $percent;
                break;
            case 'price':
                $coupon->price = $amount;
                break;
            default:
                // Bilinmeyen coupon türüne karşı bir işlem yapılabilir
                break;
        }

        $content['coupon'] = $coupon;

        $this->events->dispatch('cart.updated', $content);

        $this->session->put($this->instance,$content);

        return $content;
    }

    /**
     * Get coupon from to the cart.
     *
     * @return stdClass
     */
    public function coupon(): stdClass
    {
        return $this->getContentItems()->get('coupon');
    }

    public function couponPrice(): float
    {
        return $this->hasCoupon() ? (float) $this->coupon()->price : 0.0;
    }

    public function cartItems(): Collection
    {
        return $this->getContentItems()->get('items');
    }

    /**
     * It returns whether there are coupons in the shopping cart.
     *
     * @return bool
     */
    public function hasCoupon(): bool
    {
        return (count((array) $this->getContentItems()->get('coupon')) !== 0);
    }

    /**
     * Deletes coupon from shopping cart.
     *
     * @return Collection
     */
    public function removeCoupon(): Collection
    {
        $content = $this->getContentItems();

        if (isset($content['coupon'])) {
            unset($content['coupon']);

            $this->events->dispatch('cart.updated', $content);

            $this->session->put($this->instance, $content);
        }

        return $content;
    }

    public function addDiscount()
    {

    }

    public function getDiscount()
    {

    }

    public function addCargo($id, string $name, $price): Collection
    {
        $content = $this->getContentItems();

        $cargo = (object) [
            'id' => $id,
            'name' => $name,
            'price' => $price,
        ];

        $content['cargo'] = $cargo;

        $this->events->dispatch('cart.updated', $content);

        $this->session->put($this->instance, $content);

        return $content;
    }

    public function removeCargo()
    {

    }

    /**
     * Get cargo from to the cart.
     *
     * @return stdClass
     */
    public function cargo(): stdClass
    {
        return $this->getContentItems()->get('cargo');
    }

    public function cargoPrice(): float
    {
        return $this->hasCargo() ? (float) $this->cargo()->price : 0.0;
    }

    /**
     * It returns whether there are cargo in the shopping cart.
     *
     * @return bool
     */
    public function hasCargo(): bool
    {
        return (count((array) $this->getContentItems()->get('cargo')) !== 0);
    }

    /**
     * Update the cart item with the given rowId.
     *
     * @param mixed  $qty
     */
    public function update(string $rowId, $qty): ?ShoppingCartItem
    {
        $cartItem = $this->get($rowId);

        if ($qty instanceof Buyable) {
            $cartItem->updateFromBuyable($qty);
        } elseif (is_array($qty)) {
            $cartItem->updateFromArray($qty);
        } else {
            $cartItem->qty = $qty;
        }

        $content = $this->getContentItems();

        if ($rowId !== $cartItem->rowId) {
            $content->get('items')->pull($rowId);

            if ($content->get('items')->has($cartItem->rowId)) {
                $existingCartItem = $this->get($cartItem->rowId);
                $cartItem->setQuantity($existingCartItem->qty + $cartItem->qty);
            }
        }

        if ($cartItem->qty <= 0) {
            $this->remove($cartItem->rowId);
            return null;
        } else {
            $content->get('items')->put($cartItem->rowId, $cartItem);
        }

        $this->events->dispatch('cart.updated', $cartItem);

        $this->session->put($this->instance, $content);

        return $cartItem;
    }

    /**
     * Remove the cart item with the given rowId from the cart.
     */
    public function remove(string $rowId): void
    {
        $cartItem = $this->get($rowId);

        $content = $this->getContentItems();

        $content->get('items')->pull($cartItem->rowId);

        $this->events->dispatch('cart.removed', $cartItem);

        $this->session->put($this->instance, $content);
    }

    /**
     * Get a cart item from the cart by its rowId.
     */
    public function get(string $rowId): ShoppingCartItem
    {
        $content = $this->getContentItems();

        if ( ! $content->get('items')->has($rowId))
            throw new InvalidRowIDException("The cart does not contain rowId {$rowId}.");

        return $content->get('items')->get($rowId);
    }

    /**
     * Destroy the current cart instance.
     */
    public function destroy(): void
    {
        $this->session->remove($this->instance);
    }

    /**
     * Get the content of the cart.
     */
    public function content(): Collection
    {
        if (!$this->session->has($this->instance)) {
            return $this->getDefaultInstance();
        }

        return $this->session->get($this->instance);
    }

    /**
     * Get the number of items in the cart.
     *
     * @return int|float
     */
    public function count()
    {
        return $this->getContentItems()->get('items')->sum('qty');
    }

    /**
     * Get the total price of the items in the cart.
     */
    public function total(): float
    {
        $content = $this->getContentItems();

        $total = $content->get('items')->reduce(function ($total, ShoppingCartItem $cartItem) {
            return $total + ($cartItem->qty * $cartItem->priceTax);
        }, 0);

        if(count((array) $content->get('coupon')) !== 0)
        {
            $coupon = $content->get('coupon');
            if ($coupon->type == "percentage") {
                $percent = $total / $coupon->amount;
                $total -= $percent;
            }else if ($coupon->type == "price") {
                $total -= $coupon->amount;
            }
        }

        if(count((array) $content->get('cargo')) !== 0)
        {
            $cargo = $content->get('cargo');
            $dbCargo = Cargo::whereId($cargo->id)->first();
            $total += $dbCargo->price;
        }

        return $total;
    }

    /**
     * Gets the formatted total price of the items in the cart
     */
    public function totalFormat(?int $decimals = null, ?string $decimalPoint = null, ?string $thousandSeparator = null): string
    {
        return $this->numberFormat($this->total(), $decimals, $decimalPoint, $thousandSeparator);
    }


    /**
     * Get the total tax of the items in the cart.
     */
    public function tax(): float
    {
        $content = $this->getContentItems();

        return $content->get('items')->reduce(
            fn ($tax, ShoppingCartItem $cartItem) => $tax + ($cartItem->qty * $cartItem->tax),
            0
        );
    }

    /**
     * Get the formatted total tax of the items in the cart
     */
    public function taxFormat(?int $decimals = null, ?string $decimalPoint = null, ?string $thousandSeparator = null): string
    {
        return $this->numberFormat($this->tax(), $decimals, $decimalPoint, $thousandSeparator);
    }

    /**
     * Get the subtotal (total - tax) of the items in the cart.
     */
    public function subtotal(): float
    {
        $content = $this->getContentItems();

        return $content->get('items')->reduce(
            fn ($subTotal, ShoppingCartItem $cartItem) => $subTotal + ($cartItem->qty * $cartItem->price),
            0
        );
    }

    /**
     * Gets the formatted subtotal of the items in the cart.
     */
    public function subtotalFormat(?int $decimals = null, ?string $decimalPoint = null, ?string $thousandSeparator = null): string
    {
        return $this->numberFormat($this->subtotal(), $decimals, $decimalPoint, $thousandSeparator);
    }

    /**
     * Get or set specific cost in the cart.
     *
     * @return void|float
     */
    public function cost(string|CostType $type, ?float $price = null)
    {
        if (is_a($type, CostType::class))
            $type = strtolower($type->name);

        if ($price === null)
            return $this->extraCosts->get($type, 0);
        else
        {
            $oldCost = $this->extraCosts->pull($type, 0);

            $this->extraCosts->put($type, $price + $oldCost);
        }
    }

    public function shippingCost(float $price)
    {

    }

    /**
     * Format a cost in the cart
     */
    public function costFormat(string|CostType $type, ?int $decimals = null, ?string $decimalPoint = null, ?string $thousandSeparator = null): string
    {
        return $this->numberFormat($this->cost($type), $decimals, $decimalPoint, $thousandSeparator);
    }

    /**
     * Search the cart content for a cart item matching the given search closure.
     *
     * @param \Closure $search
     */
    public function search(Closure $search): Collection
    {
        $content = $this->getContentItems();

        return $content->get('items')->filter($search);
    }

    /**
     * Associate the cart item with the given rowId with the given model.
     *
     * @param mixed  $model
     */
    public function associate(string $rowId, $model): void
    {
        if(is_string($model) && ! class_exists($model)) {
            throw new UnknownModelException("The supplied model {$model} does not exist.");
        }

        $cartItem = $this->get($rowId);

        $cartItem->associate($model);

        $content = $this->getContentItems();

        $content->get('items')->put($cartItem->rowId, $cartItem);

        $this->session->put($this->instance, $content);
    }

    /**
     * Set the tax rate for the cart item with the given rowId.
     *
     * @param int|float $taxRate
     */
    public function setTax(string $rowId, $taxRate): void
    {
        $cartItem = $this->get($rowId);

        $cartItem->setTaxRate($taxRate);

        $content = $this->getContentItems();

        $content->get('items')->put($cartItem->rowId, $cartItem);

        $this->session->put($this->instance, $content);
    }

    /**
     * Store an the current instance of the cart.
     *
     * @param mixed $identifier
     */
    public function store($identifier): void
    {
        $content = $this->getContentItems();

        if ($this->storedCartWithIdentifierExists($identifier)) {
            throw new CartAlreadyStoredException("A cart with identifier {$identifier} was already stored.");
        }

        $this->getConnection()->table($this->getTableName())->insert([
            'identifier' => $identifier,
            'instance' => $this->currentInstance(),
            'content' => serialize($content)
        ]);

        $this->events->dispatch('cart.stored');
    }

    /**
     * Restore the cart with the given identifier.
     *
     * @param mixed $identifier
     */
    // Change
    public function restore($identifier): void
    {
        if( ! $this->storedCartWithIdentifierExists($identifier)) {
            return;
        }

        $stored = $this->getConnection()->table($this->getTableName())
            ->where('identifier', $identifier)->first();

        $storedContent = unserialize($stored->content);

        $currentInstance = $this->currentInstance();

        $this->instance($stored->instance);

        $content = $this->getContentItems();

        foreach ($storedContent as $cartItem) {
            $content->put($cartItem->rowId, $cartItem);
        }

        $this->events->dispatch('cart.restored');

        $this->session->put($this->instance, $content);

        $this->instance($currentInstance);

        $this->getConnection()->table($this->getTableName())
            ->where('identifier', $identifier)->delete();
    }

    /**
     * Get the carts content from session, if there is no cart content set yet, return a new empty Collection
     */
    private function getContent(): Collection
    {
        return $this->session->get($this->instance, $this->getDefaultInstance());
    }

    private function getContentItems(): Collection
    {
        return $this->session->get($this->instance, $this->getDefaultInstance());
    }

    private function getDefaultInstance(): Collection
    {
        return new Collection([
            'items' => new Collection(),
            'cargo' => new stdClass(),
            'coupon' => new stdClass(),
            'discounts' => new Collection(),
        ]);
    }

    /**
     * Create a new CartItem from the supplied attributes.
     *
     * @param array|Buyable|int|string $id
     * @param mixed $name
     * @param int|float $qty
     */
    private function createCartItem($id, string $image,$name, $qty, ?float $price,  array $options = []): ShoppingCartItem
    {
        if ($id instanceof Buyable) {
            $cartItem = ShoppingCartItem::fromBuyable($id, $qty ?: []);
            $cartItem->setQuantity($name ?: 1);
            $cartItem->associate($id);
        } elseif (is_array($id)) {
            $cartItem = ShoppingCartItem::fromArray($id);
            $cartItem->setQuantity($id['qty']);
        } else {
            $cartItem = ShoppingCartItem::fromAttributes($id, $image, $name, $price, $options);
            $cartItem->setQuantity($qty);
        }

        $cartItem->setTaxRate(config('cart.tax'));

        return $cartItem;
    }

    /**
     * Check if the item is a multidimensional array or an array of Buyables.
     *
     * @param mixed $item
     */
    private function isMulti($item): bool
    {
        if ( ! is_array($item)) return false;

        return is_array(head($item)) || head($item) instanceof Buyable;
    }

    /**
     * @param mixed $identifier
     */
    private function storedCartWithIdentifierExists($identifier): bool
    {
        return $this->getConnection()->table($this->getTableName())->where('identifier', $identifier)->exists();
    }

    /**
     * Get the database connection.
     */
    private function getConnection(): Connection
    {
        $connectionName = $this->getConnectionName();

        return app(DatabaseManager::class)->connection($connectionName);
    }

    /**
     * Get the database table name.
     */
    private function getTableName(): string
    {
        return config('cart.database.table', 'shoppingcart');
    }

    /**
     * Get the database connection name.
     */
    private function getConnectionName(): ?string
    {
        return config('cart.database.connection', config('database.default'));
    }

    /**
     * Get the formatted number
     */
    private function numberFormat($value, ?int $decimals = null, ?string $decimalPoint = null, ?string $thousandSeparator = null): string
    {
        if(is_null($decimals)){
            $decimals = config('cart.format.decimals', 2);
        }
        if(is_null($decimalPoint)){
            $decimalPoint = config('cart.format.decimal_point', '.');
        }
        if(is_null($thousandSeparator)){
            $thousandSeparator = config('cart.format.thousand_seperator', ',');
        }

        return number_format($value, $decimals, $decimalPoint, $thousandSeparator);
    }
}
