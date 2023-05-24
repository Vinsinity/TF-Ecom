<?php

namespace App\Http\Controllers\Themes\Frontend\Molla\Livewire\Product;

use App\Helpers\Cart\Facades\ShoppingCart;
use App\Models\OptionValue;
use App\Models\Product;
use Livewire\Component;

class SelectComponent extends Component
{
    public Product $product;
    public $variant = null;
    public $selectedVariant = [];
    public $quantity = 1;
    public $selectedOptions = [];
    public $counter = 0;
    public $variantCount = 0;

    public function render()
    {
        $this->variantCount = count($this->product->variations);
        return view('product.select-component');
    }

    public function addToCart()
    {
        if (isset($this->selectedVariant)) {

            $optionValueIds = array_values($this->selectedVariant);

            $variant = $this->product->variants()->whereHas('optionValues', function($query) use ($optionValueIds) {
                $query->whereIn('option_values.id', $optionValueIds);
            }, '=', count($optionValueIds))->with('product')->first();

            $this->variant = $variant;
            $options = $this->variant->optionValues->toArray();
//            $this->test($this->variant->optionValues);
//            dd($options,$this->variant->optionValues);
//            $options['image'] = $this->product->images[0];
//            dd($this->variant->id,$this->variant->product->name,$this->quantity,$this->variant->price,$this->product->images[0]->image,$options);
            ShoppingCart::add($this->variant->id,$this->product->images[0]->image,$this->variant->product->name,$this->quantity,$this->variant->price,$options);
            $this->emit('cart_update');
        }
    }

    public function updatedSelectedVariant()
    {
        $this->counter = count($this->selectedVariant);
        if (count($this->selectedVariant) == count($this->product->variations)) {
            $optionValueIds = array_values($this->selectedVariant);

            $variant = $this->product->variants()->whereHas('optionValues', function($query) use ($optionValueIds) {
                $query->whereIn('option_values.id', $optionValueIds);
            }, '=', count($optionValueIds))->with('product')->first();

            $this->variant = $variant;
        }
    }

    public function test($options = [OptionValue::class])
    {
        dd("erhan", $options);
    }
}
