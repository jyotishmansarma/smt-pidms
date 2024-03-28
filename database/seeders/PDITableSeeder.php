<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PDITableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $pdiArray = [
            'Project and Development India Limited (PDIL)',
            'CIPET'];

        foreach ($pdiArray as $product) {

            // Create pdi
            Product::create([
                'name' => $product,
            ]);
        }


    }
}
