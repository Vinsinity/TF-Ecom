<?php

namespace App\Http\Controllers\Themes\Admin\Porto;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function list()
    {
        $orders = Order::with(['orderStatus','user'])->paginate(2);
        return view('order.list',compact('orders'));
    }

    public function invoice($id)
    {
        $order = Order::whereId($id)->with('items')->first();
        return view('order.invoice',compact('order'));
    }

    public function show($id)
    {
        $order = Order::whereId($id)->with(['items','items.productVariant.product','discount'])->first();
        return view('order.show',compact('order'));
    }
}
