<?php

namespace App\Helpers\Cart\Facades;

use App\Helpers\Cart\Enums\CostType;
use App\Helpers\Cart\ShoppingCartItem;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade as Facade;
use stdClass;

//use Ramsey\Collection\Collection;

/**
 * @method static string currentInstance()
 * @method static \App\Helpers\Cart\ShoppingCart instance(?string $instance = null)
 *
 * @method static ShoppingCartItem get(string $rowId)
 * @method static ShoppingCartItem|ShoppingCartItem[] add($id, string $image, $name = null, $qty = null, $price = null, array $options = [])
 * @method static Collection addCoupon($id, string $name, $code, $amount, $type)
 * @method static Collection cartItems()
 * @method static float couponPrice()
 * @method static stdClass coupon()
 * @method static bool hasCoupon()
 * @method static Collection addCargo($id, string $name, $price)
 * @method static float cargoPrice()
 * @method static bool hasCargo()
 * @method static stdClass cargo()
 * @method static ShoppingCartItem|ShoppingCartItem[] addNew($id, $name = null, $qty = null, $price = null, array $options = [])
 * @method static ?ShoppingCartItem update(string $rowId, $qty)
 * @method static void remove(string $rowId)
 *
 * @method static void destroy()
 * @method static Collection content()
 * @method static int|float count()
 * @method static void associate(string $rowId, $model)
 * @method static void store($identifier)
 * @method static void setShippingCost($shipping_cost)
 * @method static int getShippingCost()
 * @method static void restore($identifier)
 * @method static Collection search(\Closure $search)
 *
 * @method static void setTax(string $rowId, $taxRate)
 *
 * @method static float total()
 * @method static string totalFormat(?int $decimals = null, ?string $decimalPoint = null, ?string $thousandSeparator = null)
 * @method static float tax()
 * @method static string taxFormat(?int $decimals = null, ?string $decimalPoint = null, ?string $thousandSeparator = null)
 * @method static float subtotal()
 * @method static string subtotalFormat(?int $decimals = null, ?string $decimalPoint = null, ?string $thousandSeparator = null)
 * @method static void|float cost(string|CostType $name, ?float $price = null)
 * @method static string costFormat(string|CostType $name, ?int $decimals = null, ?string $decimalPoint = null, ?string $thousandSeparator = null)
 *
 * @see \App\Helpers\Cart\ShoppingCart
 */
class ShoppingCart extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'cart';
    }
}
