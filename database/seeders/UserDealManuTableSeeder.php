<?php

namespace Database\Seeders;

use App\Models\Dealer;
use App\Models\DealerManufacturer;
use App\Models\Manufacturer;
use App\Models\User;
use DB;
use Illuminate\Database\Seeder;

class UserDealManuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


    
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            DB::table('pidms_dealers')->truncate();
            DB::table('pidms_manufacturers')->truncate();
            DB::table('pidms_dealer_manufacturers')->truncate();
            DB::table('pidms_users')->truncate();

            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            $user = [
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'username'          => 'admin',
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ];
            $user = User::create($user);
            User::findOrFail($user->id)->roles()->sync(1);


            $manufacturers =  DB::table('web_data')
            ->select('id', 'category', 'type', 'parent_id', 'name', 'address', 'mobile', 'email')
            ->where('category', 'Pipe')
            ->where('parent_id', NULL)
            ->get();


        foreach($manufacturers as $manufacturer){

            $manufacturer_created =  Manufacturer::create([
                'name' => $manufacturer->name, 
                'phone' => trim($manufacturer->mobile),
                'email' => $manufacturer->email,
                'address' => $manufacturer->address,
                'cmlno' => 'cml_no',
                'pidms_user_id' => NULL

            ]);

            $username = strtolower(
                preg_replace('/[^a-zA-Z0-9]/', '', substr($manufacturer->name, 0, 5))
             . '_'.$manufacturer->type . mt_rand(1000, 9999));

            $user_created = User::create([
                'name'           => $manufacturer->name,
                'email'          => $manufacturer->email,
                'username'          => $username,
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ]);

            User::findOrFail($user_created->id)->roles()->sync(3);
            
            $manufacturer_created->pidms_user_id = $user_created->id;
            $manufacturer_created->save();

            $dealers =  DB::table('web_data')
            ->select('id', 'category', 'type', 'parent_id', 'name', 'address', 'mobile', 'email')
            ->where('parent_id', $manufacturer->id)->get();


            if($dealers) {

            foreach($dealers as $dealer) {

                

                if($dealer->mobile) {

                    $dealer_by_phone = Dealer::where('phone_number', trim($dealer->mobile))->first();


                    if($dealer_by_phone)  {

                        DealerManufacturer::firstOrCreate([
                            'dealer_id' => $dealer_by_phone->id, 
                            'manufacturer_id' => $manufacturer_created->id
                        ]);

                    }

                    else {

                        $dealer_created = Dealer::create([
                            'name' => $dealer->name,
                            'address' => $dealer->address,
                            'phone_number' => trim($dealer->mobile),
                            'gst_no' => 'GSN_NO',
                            'pidms_user_id' => NULL
                        ]);

                        $username = strtolower(
                            preg_replace('/[^a-zA-Z0-9]/', '', substr($dealer->name, 0, 5))
                         . '_'.$dealer->type. mt_rand(1000, 9999));
    
                        $user_created = User::create([
                            'name'           => $dealer->name,
                            'email'          => $dealer->email,
                            'username'       => $username,
                            'password'       => bcrypt('password'),
                            'remember_token' => null,
                        ]);
    
                        $dealer_created->pidms_user_id = $user_created->id;
                        $dealer_created->save();
    
                        User::findOrFail($user_created->id)->roles()->sync(4);
    
                        DealerManufacturer::create([
                            'dealer_id' => $dealer_created->id, 
                            'manufacturer_id' => $manufacturer_created->id
                        ]);

                    }   
                   
                }             
            }
         }  
      }
    }
}
