<?php

namespace App\Http\Controllers\Themes\Frontend\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }
}
