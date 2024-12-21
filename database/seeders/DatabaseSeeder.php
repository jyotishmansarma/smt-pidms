<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleTableSeeder::class,
            PermissionTableSeeder::class,
            ProductTypesTableSeeder::class,
            ProductsTableSeeder::class,
            StatusTableSeeder::class, 
            UserTableSeeder::class,
            UserDealManuTableSeeder::class,
            PermissionRoleTableSeeder::class
            
        ]);
    }
}
