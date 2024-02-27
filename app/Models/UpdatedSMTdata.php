<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdatedSMTdata extends Model
{
    use HasFactory;
    protected $fillable=[
        'smt_id',
        'update_est_cost',
        'update_no_fhtc',
        'is_matching',
        'status'

    ];
}
