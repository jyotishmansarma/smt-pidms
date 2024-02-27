<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandFinalization extends Model
{
    use HasFactory;
    protected $fillable=[
        'district_id',
        'division_id',
        'sanctioned_schemes',
        'no_of_schemes_district_aa',
        'aa_obtained_district_aa',
        'balance_aa',
        'land_finalized',
        'balance_for_land_finalized',

    ];
}
