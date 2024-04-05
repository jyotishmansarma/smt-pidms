<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use JeroenG\Explorer\Application\Explored;
use Laravel\Scout\Searchable;


class Schemes extends Model implements Explored
{
    use HasFactory;
    use Searchable;

    protected $fillable=[
        'scheme_id',
        'scheme_name',
        'division'
    ];

    protected $primaryKey = 'scheme_id';

    // protected $with = ['slssc'];

    // public function slssc()
    // {
    //     return $this->hasOne(SlsscSchemes::class,'id','slssc_id');

    // }

    public function toSearchableArray(): array
    {
        return [
            'scheme_id' => $this->scheme_id,
            'scheme_name' => $this->scheme_name,
            'division' => $this->division,
        ];
    }

    public function mappableAs(): array
    {
        return [
            'scheme_id' => 'keyword',
            'scheme_name' => 'text',
            'division' => 'text',
        ];
    }
}
