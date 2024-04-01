<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));

//        $user_permissions = $admin_permissions->filter(function ($permission) {
//            return substr($permission->title, 0, 5) != 'user_';
//        });
        $user_permissions = $admin_permissions->where('title','purchase')->pluck('id');
        //manufacture
        Role::findOrFail(3)->permissions()->sync($user_permissions);
    }
}
