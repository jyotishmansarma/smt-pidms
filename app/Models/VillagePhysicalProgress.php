<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillagePhysicalProgress extends Model
{
    use HasFactory;
    protected $fillable=[
        'panchayat_id',
        'village_id',
        'house_holds',
        'house_connection',
        'exp_date_of_saturation',
        'exp_date_of_har_ghar_jal',
    ];
    protected $with = ['village'];

//    public function users(){
//        return $this->belongsToMany(User::class);
//    }

    public function village(){
        return $this->belongsTo(Village::class,'village_id','id');
    }

}
