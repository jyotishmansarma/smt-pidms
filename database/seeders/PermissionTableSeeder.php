<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'title' => 'create_purchase',
            ],
            [
                'title' => 'list_purchase',
            ],
            [
                'title' => 'edit_purchase',
            ],
            [
                'title' => 'old_purchase_entry',
            ]
        ];

        Permission::insert($permissions);
    }
}
