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
        $all_permissions = Permission::all();

        $admin_titles = ['list_purchase', 'edit_purchase'];
        $admin_permissions = $all_permissions->whereIn('title', $admin_titles)->pluck('id');
        Role::findOrFail(1)->permissions()->sync($admin_permissions);

        //manufacture
        $manufacturerp_titles = ['old_purchase_entry', 'list_purchase', 'edit_purchase'];
        $manufacturer_permissions = $all_permissions->whereIn('title', $manufacturerp_titles)->pluck('id');
        Role::findOrFail(3)->permissions()->sync($manufacturer_permissions);

        //dealer
        $dealerp_titles = ['create_purchase', 'list_purchase', 'edit_purchase'];
        $dealer_permissions = $all_permissions->whereIn('title',$dealerp_titles)->pluck('id');
        Role::findOrFail(4)->permissions()->sync($dealer_permissions);
    }
}
