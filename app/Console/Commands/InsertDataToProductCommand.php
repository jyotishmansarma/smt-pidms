<?php

namespace App\Console\Commands;

use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\TempProduct;
use Illuminate\Console\Command;

class InsertDataToProductCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:manufacturer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fill manufacturer table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $data =  TempProduct::all();
        
        foreach($data as $data_item) {
            Manufacturer::create([
                'name' => $data_item->v_name,
                'phone' => $data_item->v_phone,
                'email' => $data_item->v_email,
                'address' => $data_item->v_address,
                'cmlno' => $data_item->cml_no,
                'pidms_user_id' => 2
            ]);
        }

        $this->info('Data transfer completed successfully!');

        return 0;
    }
}
