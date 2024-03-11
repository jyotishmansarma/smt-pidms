<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schemes extends Model
{
    use HasFactory;
    protected $fillable=[
        'scheme_name',
        'division'
    ];

    protected $primaryKey = 'scheme_id';

    // protected $with = ['slssc'];

    // public function slssc()
    // {
    //     return $this->hasOne(SlsscSchemes::class,'id','slssc_id');

    // }
}
