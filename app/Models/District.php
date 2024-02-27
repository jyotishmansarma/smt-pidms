<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $fillable=[
        'district_name'
    ];
    protected $with = ['zone'];
    public function zone(){
        return $this->belongsTo(Zone::class,'zone_id','id');
    }

}
