<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmtSlsscMapping extends Model
{
    use HasFactory;

    protected $fillable=[
        'smt_id',
        'slssc_id',
        'slssc_scheme_id',

    ];

    public function slssc_scheme()
    {
        return $this->belongsTo(SlsscSchemes::class,'id','slssc_scheme_id');
    }
}
