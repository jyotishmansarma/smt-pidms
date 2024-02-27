<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicalProgress extends Model
{
    use HasFactory;
    protected $fillable=[
        'district_id',
        'division_id',
        'scheme_name',
        'estimated_cost',
        'fhtc_planned',
        'physical_progess',
        'expected_date',
        'expected_date_trial_run',
        'expected_date_handover',
    ];
}
