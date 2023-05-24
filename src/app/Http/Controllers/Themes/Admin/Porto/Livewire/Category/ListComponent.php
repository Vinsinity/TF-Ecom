<?php

namespace App\Http\Controllers\Themes\Admin\Porto\Livewire\Category;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ListComponent extends Component
{

    public $deleteId;

    public function render()
    {
        $categories = Category::whereNull('category_id')->where('is_deleted',0)->with('children')->withCount('products')->get();
        return view('category.list-component',compact('categories'));
    }

    public function delete($id)
    {
        $this->deleteId = $id;
    }

    public function deleteCategory()
    {
        Category::whereId($this->deleteId)->update(['is_deleted' => 1]);
        $category = Category::find($this->deleteId);
        $category?->products()->detach();
    }

}
