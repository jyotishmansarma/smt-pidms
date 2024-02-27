<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchemeCompletion extends Model
{
    use HasFactory;
    protected $fillable=[
        'district_id',
        'division_id',
        'completed_schemes',
        'fhtc_in_completed_schemes',
        'completed_schemes_handed_pri',
        'balance_schemes_handed_pri',
        'wuc_formed_againts_completed_schemes',
        'wuc_not_formed_againts_completed_schemes',
        'no_of_jal_mitra_trained',
        'no_of_jal_mitra_eng_letter',
        'scheme_id'
    ];
}
