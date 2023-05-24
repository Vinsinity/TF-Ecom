<?php

namespace App\Http\Controllers\Themes\Frontend\Molla;

use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function cart()
    {
        return view('cart.cart');
    }

    public function checkout()
    {
        return view('cart.checkout');
    }
}
