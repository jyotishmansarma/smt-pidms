<?php

namespace Database\Seeders;

use App\Models\Dealer;
use App\Models\DealerManufacturer;
use App\Models\Manufacturer;
use App\Models\User;
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
        
        $dealers = DB::table('ipet_dealer')->select('d_name','d_phone','d_address')->get();
        
        foreach($dealers as $dealer) {
            Dealer::create([
               'name' => $dealer->d_name,
               'address' => $dealer->d_address,
               'phone_number' => $dealer->d_phone,
               'gst_no' => 'GSN_NO'
            ]);
        }


        //     DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        //     DB::table('dealers')->truncate();
        //     DB::table('manufacturers')->truncate();
        //     DB::table('dealer_manufacturers')->truncate();

        //     DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        //     $upvc_manufacturers =  DB::table('web_data')
        //     ->select('id', 'category', 'type', 'parent_id', 'name', 'address', 'mobile', 'email')
        //     ->where('category', 'Pipe')
        //     ->where('type', 'UPVC')
        //     ->where('parent_id', NULL)
        //     ->get();

        

        // foreach($upvc_manufacturers as $upvc_manufacturer){

        //     $manufacturer_created =  Manufacturer::create([
        //         'name' => $upvc_manufacturer->name, 
        //         'phone' => $upvc_manufacturer->mobile,
        //         'email' => $upvc_manufacturer->email,
        //         'address' => $upvc_manufacturer->address,
        //         'cmlno' => 'cml_no',
        //         'pidms_user_id' => NULL

        //     ]);

        //     $user_created = User::create([
        //         'name'           => $upvc_manufacturer->name,
        //         'email'          => $upvc_manufacturer->email,
        //         'username'          => strtolower(substr($upvc_manufacturer->name, 0, 5)).'_upvc',
        //         'password'       => bcrypt('password'),
        //         'remember_token' => null,
        //     ]);

        //     User::findOrFail($user_created->id)->roles()->sync(3);
            
        //     $manufacturer_created->pidms_user_id = $user_created->id;
        //     $manufacturer_created->save();

        //     $dealers =  DB::table('web_data')
        //     ->select('id', 'category', 'type', 'parent_id', 'name', 'address', 'mobile', 'email')
        //     ->where('parent_id', $upvc_manufacturer->id)->get();


        //     if($dealers) {

        //     foreach($dealers as $dealer) {

        //         $dealer_created = Dealer::create([
        //                'name' => $dealer->name,
        //                'address' => $dealer->address,
        //                'phone_number' => $dealer->mobile,
        //                'gst_no' => 'GSN_NO',
        //                'pidms_user_id' => NULL
        //         ]);

        //         $user_created = User::create([
        //             'name'           => $dealer->name,
        //             'email'          => $dealer->email,
        //             'username'       => strtolower(substr($dealer->name, 0, 5)) . '_upvcd',
        //             'password'       => bcrypt('password'),
        //             'remember_token' => null,
        //         ]);

        //         $dealer_created->pidms_user_id = $user_created->id;
        //         $dealer->save();

        //         User::findOrFail($user_created->id)->roles()->sync(4);

        //         DealerManufacturer::create([
        //             'dealer_id' => $dealer_created->id, 
        //             'manufacturer_id' => $manufacturer_created->id
        //         ]);
        //     }
        // }
        // }
        
        
    }
}
