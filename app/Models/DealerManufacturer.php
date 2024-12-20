<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealerManufacturer extends Model
{
    use HasFactory;
    protected $table = 'pidms_dealer_manufacturers';

    protected $fillable = [ 'dealer_id' , 'manufacturer_id'];
}
