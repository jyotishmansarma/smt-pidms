<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;
use App\Models\Role;

class StatusTableSeeder extends Seeder
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
                'name' => 'Initiated',
            ],
            [
                'name' => 'Acknowledged',
            ],
            [
                'name' => 'Verified',
            ], [
                'name' => 'Not Verified',
            ],[
                'name' => 'On Process',
            ],[
                'name' => 'PDI Call',
            ],[
                'name' => 'Delivered',
            ],[
                'name' => 'Received',
            ],
        ];

        Status::insert($roles);
    }
}
