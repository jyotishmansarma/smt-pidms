<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;
    protected $fillable=[
        'village_name',
        'panchayat_id',
    ];
    protected $with = ['panchayat'];


    public function panchayat(){
        return $this->belongsTo(Panchayat::class,'panchayat_id','id');
    }

}
