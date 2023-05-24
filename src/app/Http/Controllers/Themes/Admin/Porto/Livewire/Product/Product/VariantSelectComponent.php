<?php

namespace App\Http\Controllers\Themes\Admin\Porto\Livewire\Product\Product;

use App\Helpers\Cartesian;
use App\Models\Attribute;
use App\Models\Option;
use Livewire\Component;

class VariantSelectComponent extends Component
{

    public $selectedAttributeIds = [];
    public $selectedAttributes = [];
    public $selectedValues = [];

    public $variations = [];

    public function render()
    {
        $options = Option::with('values')->get();
        return view('product.product.variant-select-component', compact('options'));
    }

    public function updatedSelectedAttributeIds()
    {
        $this->selectedAttributes = [];
        $this->variations = [];
        $this->selectedValues = [];
        $this->selectedAttributes = Option::whereIn('id',$this->selectedAttributeIds)->with('values')->get();
    }

    public function setVariationsTable()
    {
        $attributeValues = $this->selectedValues;
        $table = [];
        foreach ($attributeValues as $value){
            $newValue = [];
            foreach ($value as $item){
                $newValue[] = json_decode($item);
            }
            $table[] = $newValue;
        }
        $cartesian = Cartesian::build($table);
        $new = array();
        foreach ($cartesian as $car) {
            $row['price'] = 0;
            $row['stock'] = 0;
            $row['options'] = $car;
            $new[] = $row;
        }
        $this->variations = $new;
        // TODO: emit to add form
        $this->emit('variantAdded',$this->variations);
        $this->emit('variantOptionsAdded',$this->selectedAttributes);
    }
}
