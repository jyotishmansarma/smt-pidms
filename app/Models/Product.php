<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [ 'name'] ;
    protected $table = 'ipet_prod_master';
    protected $primaryKey = 'prod_id';
}
