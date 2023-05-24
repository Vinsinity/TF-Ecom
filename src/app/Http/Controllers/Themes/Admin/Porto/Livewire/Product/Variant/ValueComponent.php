<?php

namespace App\Http\Controllers\Themes\Admin\Porto\Livewire\Product\Variant;

use App\Models\Option;
use Livewire\Component;

class ValueComponent extends Component
{
    public $slug;
    public function render()
    {
        $option = Option::where('slug',$this->slug)->with('values')->first();
        return view('product.variants.value-component',compact('option'));
    }
}
