<?php

namespace App\Http\Controllers\Themes\Admin\Porto;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Role\StoreRequest;
use App\Models\Permission;
use App\Models\Role;

class RoleController extends Controller
{
    public function roles()
    {
        $roles = Role::with('permissions')->get();
        return view('role.list',compact('roles'));
    }

    public function add()
    {
        $permissions = Permission::all();
        return view('role.add',compact('permissions'));
    }

    public function addPost(StoreRequest $request)
    {
//        dd($request->all());
        $role = Role::create($request->only(['name']));
        if($role) {
            $permissions = $request->validated('selectedPermissions');
            $role->permissions()->attach($permissions);
            return redirect()->route('admin.roles.list')->with('success','Added');
        }else{
            return redirect()->route('admin.roles.list')->with('error','Not dded');
        }
    }

    public function show($slug)
    {
        $role = Role::whereSlug($slug)->with('permissions')->first();
        $permissions = Permission::all();
        return view('role.show',compact('role','permissions'));
    }

    public function permissions()
    {
        return 'permissions';
    }
}
