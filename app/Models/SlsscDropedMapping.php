<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SlsscDropedMapping extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
        'slssc_scheme_id',
        'status',
        'mapping_slssc_scheme_id'


    ];
    public function slssc_schemes()
    {
        return $this->belongsTo(SlsscSchemes::class,'id','slssc_scheme_id');
    }
}
