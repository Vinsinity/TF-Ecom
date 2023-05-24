<?php

namespace App\Http\Controllers\Themes\Frontend\Molla;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $slides = Slide::where('status',1)->orderBy('order')->get();
        return view('home.index',compact('slides'));
    }
}
