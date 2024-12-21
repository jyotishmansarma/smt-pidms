<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     const ROLE_ADMIN = 1;
     const ROLE_DEALER = 4;

    public function run()
    {
        User::findOrFail(1)->roles()->sync(self::ROLE_ADMIN);
        User::findOrFail(2)->roles()->sync(self::ROLE_DEALER);
    }
}
