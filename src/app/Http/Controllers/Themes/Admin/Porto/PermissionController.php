<?php

namespace App\Http\Controllers\Themes\Admin\Porto;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Permission\StoreRequest;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function permissions()
    {
        $permissions = Permission::with('roles','admins')->get();
        return view('permission.list',compact('permissions'));
    }

    public function add()
    {
        return view('permission.add');
    }

    public function addPost(StoreRequest $request)
    {
        $permission = Permission::create($request->validated());
        if($permission) {
            return redirect()->route('admin.permissions.list')->with('success','Added');
        }else{
            return redirect()->route('admin.permissions.list')->with('error','Not dded');
        }
    }
}
