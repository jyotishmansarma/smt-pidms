<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempProduct extends Model
{
    use HasFactory;
    protected $fillable = ['v_name','v_phone', 'v_address', 'cml_no', 'v_email', ];
    protected $table = 'ipet_vendors';

}
