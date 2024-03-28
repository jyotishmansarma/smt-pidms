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
                'id'    => 1,
                'title' => 'create_purchase',
            ],
            [
                'id'    => 2,
                'title' => 'list_purchase',
            ],
            [
                'id'    => 3,
                'title' => 'purchase',
            ],
        ];

        Permission::insert($permissions);
    }
}
