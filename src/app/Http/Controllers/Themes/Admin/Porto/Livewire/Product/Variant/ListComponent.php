<?php

namespace App\Http\Controllers\Themes\Admin\Porto\Livewire\Product\Variant;

use App\Models\Attribute;
use App\Models\Option;
use Livewire\Component;

class ListComponent extends Component
{
    public function render()
    {
        $variants = Option::with('values','type')->get();
        return view('product.variants.list-component',compact('variants'));
    }
}
