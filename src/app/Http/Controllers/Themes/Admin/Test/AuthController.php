<?php

namespace App\Http\Controllers\Themes\Admin\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }
}
