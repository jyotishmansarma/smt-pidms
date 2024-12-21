<?php

namespace Database\Seeders;

use App\Models\Dealer;
use Illuminate\Database\Seeder;
use App\Models\User;
use DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'username'          => 'admin',
                'password'       => bcrypt('password'),
                'remember_token' => null,


        ];
        $user = User::create($user);
        User::findOrFail($user->id)->roles()->sync(1);

    }
}
