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


        //TPIA
        $user = [
                'name'           => 'Cipet',
                'email'          => 'cipet@admin.com',
                'username'          => 'cipet',
                'password'       => bcrypt('password'),
                'remember_token' => null,


        ];

        $user = User::create($user);
        User::findOrFail($user->id)->roles()->sync(2);
        
        //Manufacture
        
        $user = [
                'name'           => 'CHARU TECHNOLOGY PVT. LIMITED',
                'email'          => 'charu_technology@admin.com',
                'username'          => 'charu_technology',
                'password'       => bcrypt('password'),
                'remember_token' => null,


        ];

        $user = User::create($user);
        User::findOrFail($user->id)->roles()->sync(3);

        // Dealer 

        $user = [
            'name'           => 'Binod Kumar Chirania',
            'email'          => 'binod_chirania@admin.com',
            'username'          => '8876461159',
            'password'       => bcrypt('password'),
            'remember_token' => null,
        ];

        $user = User::create($user);
        User::findOrFail($user->id)->roles()->sync(4);

    }
}
