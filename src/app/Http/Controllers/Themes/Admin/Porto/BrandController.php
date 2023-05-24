<?php

namespace App\Http\Controllers\Themes\Admin\Porto;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function list()
    {
        $brands = Brand::all();
        return view('product.brand.list', compact('brands'));
    }
}
