<?php

namespace App\Http\Controllers\Themes\Frontend\Molla\Livewire\Cart;

use App\Helpers\Cart\Enums\CostType;
use App\Helpers\Cart\Facades\ShoppingCart;
use App\Models\Cargo;
use App\Models\DiscountCode;
use Livewire\Component;

class CartComponent extends Component
{
    protected $listeners = ['cart_update' => 'render'];
    public $couponCode;
    public $shippingCost;

    public function render()
    {
        $cart = ShoppingCart::instance();
        $cargos = Cargo::all();
        $this->shippingCost = ShoppingCart::hasCargo() ? ShoppingCart::cargo()->id : null;
//        dd($cart);
//        dd(ShoppingCart::instance(),ShoppingCart::instance()->content());
        return view('cart.cart-component',compact('cart','cargos'));
    }

    public function updatedShippingCost($cargoId)
    {
        $cargo = Cargo::whereId($cargoId)->first();
        ShoppingCart::addCargo($cargo->id,$cargo->name,$cargo->price);
        $this->emit('cart_update');
    }

    public function increment()
    {

    }

    public function decrement()
    {

    }

    public function updateCart()
    {

    }

    public function couponCode()
    {
        $validatedData = $this->validate([
            'couponCode' => 'required|min:6|max:6',
        ]);
        $coupon = DiscountCode::where('code',$validatedData['couponCode'])->first();
        if ($coupon) {
            ShoppingCart::addCoupon($coupon->id,$coupon->title,$coupon->code,$coupon->amount,$coupon->type);
            $this->emit('cart_update');
        }
    }

    public function removeItem($rowId)
    {
        ShoppingCart::remove($rowId);
//        $this->emit('cart_update');
    }
}
