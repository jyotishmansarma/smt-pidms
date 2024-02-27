<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;
    protected $fillable=[
        'division_name',
        'zone_id',
        'circle_id'
    ];
    protected $with = ['circle','zone'];


    public function circle(){
        return $this->belongsTo(Circle::class,'circle_id','id');
    }

    public function zone(){
        return $this->belongsTo(Zone::class,'zone_id','id');
    }
    public function district(){
        return $this->belongsTo(DivisionDistrict::class,'id','division_id');
    }

}
