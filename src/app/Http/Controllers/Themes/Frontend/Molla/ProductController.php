<?php

namespace App\Http\Controllers\Themes\Frontend\Molla;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Request $request)
    {
        $product = Product::where('slug', $request->slug)->with('variants.optionValues.option.type','variants.reviews.user','categories','categories.children','images')->first();
//        dd($product);
        return view('product.show', compact('product'));
    }


}
