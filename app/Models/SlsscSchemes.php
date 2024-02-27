<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlsscSchemes extends Model
{
    protected $table = 'slssc_schemes';
    use HasFactory;
    protected $fillable=[
        'district_id',
        'division_id',
        'scheme_name',
        'sanctioned_type',
        'scheme_type',
        'final_estmd_cost',
        'final_fhtcs_approved',
    ];
    public function schemes()
    {
        return $this->belongsTo(Schemes::class);
    }

    public function smt_slssc_mapping()
    {
        return $this->hasOne(SmtSlsscMapping::class,'slssc_scheme_id','id');
    }

    public function slssc_dropped()
    {
        return $this->hasOne(SlsscDropedMapping::class,'slssc_scheme_id','id');
    }
}
