<?php

namespace App\Http\Controllers\Themes\Frontend\Molla;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
//    public function show(Request $request)
//    {
//        $category = Category::where('slug',$request->slug)->with('products.variants.reviews','products.variants.optionValues.option.type','children','parent')->first();
//        $products = $category->products()->with('variants.optionValues.option.type','variants.reviews','images','variantReviews','categories')->orderBy('created_at','desc')->paginate(3);
//        $options = $this->calculateOptions($products);
//        return view('category.show', compact('category','products','options'));
//    }
//
//    public function calculateOptions($products)
//    {
//        $options = [];
//
//        foreach ($products as $product) {
//            foreach ($product->variants as $variant) {
//                foreach ($variant->optionValues as $optionValue) {
//                    $option = $optionValue->option;
//                    $value = $optionValue->value;
//                    $valueId = $optionValue->id;
//                    $optionId = $optionValue->option_id;
//                    $valueArray = array('value' => $value, 'id' => $valueId, 'option_id' => $optionId);
//
//                    if (!isset($options[$option->name])) {
//                        $options[$option->name] = [];
//                    }
//
//                    if (!in_array($valueArray, $options[$option->name])) {
//                        $options[$option->name][] = $valueArray;
//                    }
//                }
//            }
//        }
//
//        return $options;
//    }
    public function show(Request $request)
    {
        $category = Category::where('slug',$request->slug)
            ->with('products.variants.reviews', 'children', 'parent')
            ->first();

        $products = $category->products()->with('variants.optionValues.option.type', 'variants.reviews', 'images', 'variantReviews', 'categories')
//            ->withCount('variantReviews')
            ->orderBy('created_at','desc')->paginate(3);

        $options = $this->calculateOptions($products);

        return view('category.show', compact('category','products','options'));
    }

    public function calculateOptions($products)
    {
        $options = [];

        foreach ($products as $product) {
            foreach ($product->variants as $variant) {
                foreach ($variant->optionValues as $optionValue) {
                    $option = $optionValue->option;
                    $value = $optionValue->value;
                    $valueId = $optionValue->id;
                    $optionId = $optionValue->option_id;
                    $valueArray = array('value' => $value, 'id' => $valueId, 'option_id' => $optionId);

                    if (!isset($options[$option->name])) {
                        $options[$option->name] = [];
                    }

                    if (!in_array($valueArray, $options[$option->name])) {
                        $options[$option->name][] = $valueArray;
                    }
                }
            }
        }

        return $options;
    }
}
