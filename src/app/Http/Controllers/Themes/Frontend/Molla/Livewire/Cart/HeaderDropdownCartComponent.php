<?php

namespace App\Http\Controllers\Themes\Frontend\Molla\Livewire\Cart;

use App\Helpers\Cart\Facades\ShoppingCart;
use Livewire\Component;

class HeaderDropdownCartComponent extends Component
{
    protected $listeners = ['cart_update' => 'render'];

    public function render()
    {
        $cart = ShoppingCart::content();
//        dd($cart);
        $total = ShoppingCart::totalFormat();
        return view('cart.header-dropdown-cart-component',compact('cart','total'));
    }

    public function destroyCart() {
        ShoppingCart::destroy();
    }
}
