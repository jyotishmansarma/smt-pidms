<?php

namespace Database\Seeders;

use App\Models\Dealer;
use DB;
use Illuminate\Database\Seeder;

class DealerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $dealers = DB::table('ipet_dealer')->select('d_name','d_phone','d_address')->get();
        
        foreach($dealers as $dealer) {
            Dealer::create([
               'name' => $dealer->d_name,
               'address' => $dealer->d_address,
               'phone_number' => $dealer->d_phone,
               'gst_no' => 'GSN_NO'
            ]);
        }
    }
}
