<?php

namespace App\Http\Controllers\Themes\Admin\Porto;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\SubsStoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list()
    {
        $categories = Category::whereNull('category_id')->with('children')->withCount('products')->get();
        return view('product.category.list', compact('categories'));
    }

    public function add()
    {
        return view('product.category.add');
    }

    public function addPost(StoreRequest $request)
    {
//        dd($request->all());
        $data = $request->validated();

        $data['image'] = $data['image']->store('category','public');
//        dd($data);
        $category = Category::create($data);
        if($category) {
            return redirect(route('admin.categories.list'))->with('success',$category->name.' added success');
        }else{
            return redirect()->back()->withErrors('An error has accord');
        }
    }

    public function show($slug)
    {
        $category = Category::where('slug',$slug)->first();
        return view('product.category.show', compact('category'));
    }

    public function update(UpdateRequest $request, $slug)
    {

        $category = Category::where('slug',$request->slug)->first();
        $data = $request->validated();
        if (!is_null($request->image)) {
            $data['image'] = $data['image']->store('category','public');
        }else{
            unset($data['image']);
        }
//        dd($category);
        $cat = Category::find($category->id)->update($data);
        if($cat) {
            return redirect(route('admin.categories.list'))->with('success',$data['name'].' update success');
        }else{
            return redirect()->back()->withErrors('An error has accord');
        }
    }

    public function subs($slug)
    {
        $category = Category::where('slug', $slug)->with('children')->first();
        $categories = $category->children;
        return view('product.category.subs', compact('categories','category'));
    }

    public function subsAdd($slug)
    {
        $parent = Category::whereSlug($slug)->first();
        return view('product.category.subs-add',compact('parent'));
    }

    public function subsAddPost(SubsStoreRequest $request, $slug)
    {
        $parent = Category::whereSlug($slug)->first();
//        dd($request->all(),$parent);
        $data = $request->validated();
        $data['category_id'] = $parent->id;
        $data['image'] = $data['image']->store('category','public');
        $category = Category::create($data);
        if($category) {
            return redirect(route('admin.categories.subs', ['slug' => $parent]))->with('success',$category->name.' added success to '.$parent->name);
        }else{
            return redirect()->back()->withErrors('An error has accord');
        }
    }
}
