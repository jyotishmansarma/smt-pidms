<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use JeroenG\Explorer\Application\Explored;
use Laravel\Scout\Searchable;

class Division extends Model implements Explored
{
    use HasFactory;
    use Searchable;
    protected $fillable=[
        'division_name',
        'zone_id',
        'circle_id'
    ];
    protected $with = ['circle','zone'];
    
    protected $table = 'division_master';

    public function circle(){
        return $this->belongsTo(Circle::class,'circle_id','id');
    }

    public function zone(){
        return $this->belongsTo(Zone::class,'zone_id','id');
    }
    public function district(){
        return $this->belongsTo(DivisionDistrict::class,'id','division_id');
    }

    public function mappableAs(): array
    {
        // TODO: Implement mappableAs() method.
    }
}
