<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'title' => 'Admin',
            ],
            [
                'title' => 'TPIA',
            ],
            [
                'title' => 'Manufacture',
            ],
            [
                'title' => 'Dealer',
            ],
        ];

        Role::insert($roles);
    }
}
