<?php

namespace App\Http\Controllers\Themes\Admin\Porto;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Option;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list()
    {
        $products = Product::with('variants.optionValues.option.type','brand','images')->orderBy('created_at','desc')->paginate(10);
        return view('product.product.list', compact('products'));
    }

    public function add()
    {
        return view('product.product.add');
    }

    public function show(Request $request)
    {
        $product = Product::where('slug', $request->slug)->with('variants.optionValues.option.type','variants.reviews.user')->first();
        $brands = Brand::all();
        $categories = Category::whereNull('category_id')->with('children')->withCount('children')->get();
        return view('product.product.show', compact('product','brands','categories'));
    }
}
