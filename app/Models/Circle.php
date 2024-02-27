<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Circle extends Model
{
    use HasFactory;
    protected $fillable=[
        'circle_name'
    ];
    protected $with = ['zone'];

    public function zone(){
        return $this->belongsTo(Zone::class,'zone_id','id');
    }

}
