<?php

namespace App\Http\Controllers\Themes\Admin\Porto;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function list()
    {
        $pages = Page::all();
        return view('page.list',compact('pages'));
    }

    public function add()
    {
        return view('page.add');
    }
}
