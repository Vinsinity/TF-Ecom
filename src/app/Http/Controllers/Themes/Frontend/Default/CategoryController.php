<?php

namespace App\Http\Controllers\Themes\Frontend\Default;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Request $request)
    {
        $category = Category::where('slug',$request->slug)->with('products.variants.optionValues.option.type','children','parent')->first();
//        dd($category);
        $products = $category->products()->paginate(3);
        $options = $this->calculateOptions($products);
//        dd($options);
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
