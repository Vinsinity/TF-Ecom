<?php

namespace App\Http\Controllers\Themes\Admin\Porto;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list()
    {

        $users = User::withCount('orders')->paginate(10);
        return view('user.list',compact('users'));
    }
}
