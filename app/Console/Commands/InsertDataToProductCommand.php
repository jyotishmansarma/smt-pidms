<?php

namespace App\Console\Commands;

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
    protected $signature = 'insert:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fill products table';

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

        $data =  Product::all();
        
        foreach($data as $data_item) {
            TempProduct::create([
                'name' => $data_item->prod_name,
                'product_type_id' => 1
            ]);
        }

        $this->info('Data transfer completed successfully!');

        return 0;
    }
}
