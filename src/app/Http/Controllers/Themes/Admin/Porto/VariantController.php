<?php

namespace App\Http\Controllers\Themes\Admin\Porto;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\Variant\StoreRequest;
use App\Http\Requests\Admin\Product\Variant\ValueStoreRequest;
use App\Models\Option;
use App\Models\OptionType;
use App\Models\OptionValue;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    public function add()
    {
        $optionTypes = OptionType::all();
        return view('product.variant.add',compact('optionTypes'));
    }

    public function addPost(StoreRequest $request)
    {
//        dd($request->validated());
        $option = Option::create($request->validated());
        $successText = $option->name.' created has successfully';
        return redirect()->route('admin.variants.list')->with('success', $successText);
    }

    public function list()
    {
        return view('product.variant.list');
    }
    public function addValue($slug)
    {
        $option = Option::where('slug',$slug)->first();
        return view('product.variant.add-value',compact('option'));
    }

    public function addValuePost(ValueStoreRequest $request, $slug)
    {
        $option = Option::where('slug',$slug)->first();
        $data = $request->validated();
        $data['option_id'] = $option->id;
        $value = OptionValue::create($data);
        $successText = $value->value.' created has created';
        return redirect()->route('admin.variants.values',['slug' => $option])->with('success',$successText);
    }

    public function edit($slug)
    {
        $variant = Option::where('slug',$slug)->with('values','type')->first();
        $optionTypes = OptionType::all();
        return view('product.variant.edit', compact('variant','optionTypes'));
    }

    public function values($slug)
    {
        $variant = Option::where('slug',$slug)->with('values')->first();
        return view('product.variant.values',compact('slug'));
    }
}
