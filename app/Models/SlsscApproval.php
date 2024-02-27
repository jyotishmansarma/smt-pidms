<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlsscApproval extends Model
{
    protected $table = 'slssc_approvals';
    use HasFactory;
    protected $fillable = [
        'slssc_id',
        'slssc_scheme_id',
        'estimated_cost',
        'fhtc_planned',
    ];
}
