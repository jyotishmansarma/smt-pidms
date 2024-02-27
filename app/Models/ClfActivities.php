<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClfActivities extends Model
{
    use HasFactory;
    protected $fillable=[
        'division_id',
        'proposed_villages',
        'actually_alloted_village',
        'clf_alloted',
        'is_training_conducted',
        'water_user_committee',
        'water_user_committee_bank_ac',
        'hh_ipc_done',
        'skilled_manpower_listed',
        'issued_date',
        'remarks',
    ];
    protected $with = ['division'];


    public function division(){
        return $this->belongsToMany(Division::class,'division_users','division_id','id');
    }
}
