<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Option;
use App\Models\OptionValue;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $create = new Permission();
        $create->name = 'create';
        $create->slug = 'create';
        $create->save();
        $read = new Permission();
        $read->name = 'read';
        $read->slug = 'read';
        $read->save();
        $update = new Permission();
        $update->name = 'update';
        $update->slug = 'update';
        $update->save();
        $delete = new Permission();
        $delete->name = 'delete';
        $delete->slug = 'delete';
        $delete->save();

        $user = new Role();
        $user->name = 'user';
        $user->slug = 'user';
        $user->save();

        $user->permissions()->attach($create);
        $user->permissions()->attach($read);

        $admin = new Role();
        $admin->name = 'admin';
        $admin->slug = 'admin';
        $admin->save();

        $admin->permissions()->attach($create);
        $admin->permissions()->attach($read);
        $admin->permissions()->attach($update);
        $admin->permissions()->attach($delete);

        $adminUser = Admin::whereId(1)->first();
        $adminUser->roles()->attach($admin);
        $adminUser->permissions()->attach($create);
        $adminUser->permissions()->attach($read);
        $adminUser->permissions()->attach($update);
        $adminUser->permissions()->attach($delete);
    }
}
