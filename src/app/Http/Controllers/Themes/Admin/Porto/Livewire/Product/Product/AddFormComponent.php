<?php

namespace App\Http\Controllers\Themes\Admin\Porto\Livewire\Product\Product;

use App\Helpers\Cartesian;
use App\Helpers\Helper;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Option;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddFormComponent extends Component
{
    use WithFileUploads;

    protected $listeners = ['setVariationsTable' => 'setVariationsTable'];

    public $name;
    public $description;
    public $selectedBrand;
    public $selectedCategories = [];
    public $variants = [];
    public $options = [];
    public $images = [];
    public $buyPrice;
    public $sellPrice;
    public $withTax = false;

    public $selectedAttributeIds = [];
    public $selectedAttributes = [];
    public $selectedValues = [];

    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'selectedBrand' => 'required',
        'selectedCategories' => 'required',
        'variants' => 'required',
        'images.*' => 'required|image|max:4096'
    ];

    public function render()
    {
        $brands = Brand::all();
        $categories = Category::whereNull('category_id')->with('children')->withCount('children')->get();
        $selectOpt = Option::with('values')->get();
//        dd(view());
//        dd($brands,$categories,$options);
        return view('product.product.add-form', compact('brands','selectOpt','categories'));
    }

    public function variantAdded($variants): void
    {
        $this->variants = $variants;
    }

    public function variantOptionsAdded($options): void
    {
        $this->options = $options;
    }

    public function addProduct()
    {
        $this->validate();
        $product = Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'brand_id' => $this->selectedBrand,
        ]);

        $product->categories()->attach($this->selectedCategories);

        foreach ($this->images as $image) {
            ProductImage::create(['product_id' => $product->id,'image' => $image->store('products','public')]);
        }

        foreach ($this->options as $option) {
            $product->options()->attach($option['id']);
        }

        foreach ($this->variants as $variation) {
            $productVariant = ProductVariant::create([
                'product_id' => $product->id,
                'sku' => $variation['sku'],
                'price' => $variation['price'] * 100,
                'stock' => $variation['stock'],
                'status' => $variation['status'],
            ]);

            foreach ($variation['options'] as $option) {
                $productVariant->optionValues()->attach($option['id']);
            }
        }

        redirect()->route('admin.products.list')->with('success','success');
    }

    public function updatedSelectedAttributeIds()
    {
        $this->selectedAttributes = [];
        $this->variants = [];
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
                $newValue[] = json_decode($item, true);
            }
            $table[] = $newValue;
        }
        $cartesian = Cartesian::build($table);
        $new = array();
        foreach ($cartesian as $car) {
            $row['price'] = 0;
            $row['stock'] = 0;
            $row['status'] = true;
            $row['sku'] = $this->generateSKUVariant($car);
            $row['options'] = $car;
            $new[] = $row;
        }
        $this->variants = $new;
    }

    private function generateSKUVariant($variant) {
        $skuParts = ['OPT'];

        // Her bir seçeneği döngüye alıyoruz
        foreach ($variant as $option) {
            // Her seçeneğin 'id' ve 'value' değerini kontrol ediyoruz
            if (!isset($option['id'], $option['slug'])) {
                throw new \Exception('Each option must have an id and value.');
            }

            // SKU'nun bir parçasını oluşturuyoruz
            $skuPart = str_pad($option['id'], 2, "0", STR_PAD_LEFT) . strtoupper(substr($option['slug'], 0, 2));
            $skuParts[] = $skuPart;
        }

        // SKU'yu oluşturuyoruz ve geri döndürüyoruz
        $sku = implode('', $skuParts);

        return $sku;
    }
}
