<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use JeroenG\Explorer\Application\Explored;
use Laravel\Scout\Searchable;

class District extends Model implements Explored
{
    use HasFactory;
    use Searchable;
    protected $fillable=[
        'district_name'
    ];
    protected $with = ['zone'];
    protected $table = 'district_master';

    public function zone(){
        return $this->belongsTo(Zone::class,'zone_id','id');
    }

    public function mappableAs(): array
    {
        // TODO: Implement mappableAs() method.
    }
}
