<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //UPVC
        $upvcproductsArray = DB::table('ipet_prod_master')->select('prod_name')
            ->where('prod_name', 'LIKE', '%UPVC%')->get();
        $upvc= $upvcproductsArray->pluck('prod_name');

        foreach ($upvc as $product) {

            // Create product
            Product::create([
                'name' => $product,
                'product_type_id' => 1,
            ]);
        }
        //PPR
        $pprproductsArray = DB::table('ipet_prod_master')->select('prod_name')
            ->where('prod_name', 'LIKE', '%PPR%')->get();
        $ppr = $pprproductsArray->pluck('prod_name');

        foreach ($ppr as $product) {

            // Create product
            Product::create([
                'name' => $product,
                'product_type_id' => 2,
            ]);
        }

        //HDPE
        $hdpeproductsArray = DB::table('ipet_prod_master')->select('prod_name')
            ->where('prod_name', 'LIKE', '%HDPE%')->get();
        $hdpe = $hdpeproductsArray->pluck('prod_name');

        foreach ($hdpe as $product) {

            // Create product
            Product::create([
                'name' => $product,
                'product_type_id' => 3,
            ]);
        }


    }
}
