<?php

namespace App\Http\Controllers\Themes\Admin\Porto;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Admin\StoreRequest;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function list()
    {
        $admins = Admin::with('roles')->paginate(10);
        return view('admin.list',compact('admins'));
    }

    public function add()
    {
        $roles = Role::all();
        return view('admin.add',compact('roles'));
    }

    public function addPost(StoreRequest $request)
    {
        $data = $request->only(['name','password','email']);
        $data['password'] = bcrypt($data['password']);
        $admin = Admin::create($data);

        $role = $request->only(['role']);
        $admin->roles()->attach($role);
        return redirect()->route('admin.admins.list')->with('success',$admin->name.' created is successfully');
    }
}
