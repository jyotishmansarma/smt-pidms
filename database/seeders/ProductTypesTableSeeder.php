<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Seeder;

class ProductTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productTypes = [
            [
                'name' => 'UPVC'

            ],
            [
                'name' => 'PPR'

            ],
            [
                'name' => 'HDPE'

            ],


        ];

        ProductType::insert($productTypes);

    }
}
