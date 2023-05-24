<?php

namespace App\Http\Controllers\Themes\Admin\Porto;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(LoginRequest $request)
    {
        $validated = $request->only('email','password');
        if(Auth::guard('admin')->attempt($validated)){
            if(Session::has('url.intended')){
                return Redirect::intended();
            }else{
                return redirect(route('admin.dashboard.index'))->with('success','You have signed-in');
            }
        }else{
            return redirect(route('admin.auth.login'))->withErrors(trans('auth.failed'));
        }
    }

    public function logout()
    {
        auth('admin')->logout();
        return redirect(route('admin.auth.login'));
    }
}
