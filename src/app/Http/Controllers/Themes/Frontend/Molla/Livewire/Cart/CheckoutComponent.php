<?php

namespace App\Http\Controllers\Themes\Frontend\Molla\Livewire\Cart;

use App\Helpers\Cart\Enums\CostType;
use App\Helpers\Cart\Facades\ShoppingCart;
use App\Helpers\Helper;
use App\Models\Cargo;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use App\Models\PaymentType;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CheckoutComponent extends Component
{
    public $cargoId;
    public $shippingCost;

    public $selectedAddress = 2;

    public $fullname;
    public $card_number;
    public $last_date;
    public $cvv;

    protected $rules = [
        'fullname' => 'required',
        'card_number' => 'required',
        'last_date' => 'required',
        'cvv' => 'required'
    ];

    public function render()
    {
        $cart = ShoppingCart::instance();
        $cargos = Cargo::all();
        $currentUser = User::whereId(Auth::id())->with('addresses')->first();

        $this->cargoId = ShoppingCart::hasCargo() ? ShoppingCart::cargo()->id : null;
        $this->selectedAddress = $currentUser->addresses ? $currentUser->addresses->first()->id : null;
        $paymentMethods = PaymentType::all();
        return view('cart.checkout-component',compact('cart','cargos','currentUser','paymentMethods'));
    }

    public function updatedCargoId($cargoId)
    {
        $cargo = Cargo::whereId($cargoId)->first();
        ShoppingCart::addCargo($cargo->id,$cargo->name,$cargo->price);
        $this->emit('cart_update');
    }

    public function proceedCheckout()
    {
        $orderNumber = Helper::generateOrderNumber();
        $status = OrderStatus::orderBy('order')->first();
        $address = UserAddress::whereId($this->selectedAddress)->first();

        $order = new Order();
        $order->order_number = $orderNumber;
        $order->order_status_id = $status->id;
        $order->user_id = Auth::id();
        $order->total_price = ShoppingCart::total();
        $order->cargo_price = ShoppingCart::cargoPrice();
        $order->tax_price = ShoppingCart::tax();
        $order->subtotal_price = ShoppingCart::subtotal();
        $order->total_quantity = ShoppingCart::count();
        $order->user_address_id = $address->id;
        $order->cargo_id = ShoppingCart::cargo()->id;

        if (ShoppingCart::hasCoupon()){
            $coupon = ShoppingCart::coupon();
            $order->discount_code_id = $coupon->id;
            $order->total_discount_price = $coupon->price;
        }

        $order->save();


        foreach (ShoppingCart::cartItems() as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_variant_id = $item->id;
            $orderItem->quantity = $item->qty;
            $orderItem->price = $item->price;
            $orderItem->total_price = $item->total;
            $orderItem->save();
        }

        ShoppingCart::destroy();
        return redirect()->route('account.index');
    }
}
