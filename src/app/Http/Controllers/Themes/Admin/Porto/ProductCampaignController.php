<?php

namespace App\Http\Controllers\Themes\Admin\Porto;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\ProductDiscount;
use Illuminate\Http\Request;

class ProductCampaignController extends Controller
{
    public function list()
    {
//        $discounts = Discount::whereId(1)->with('products')->first();
        $discounts = ProductDiscount::with('product','discount')->get();
        return view('campaigns.product.list',compact('discounts'));
    }
}
