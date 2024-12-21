<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PdiAgency extends Model
{
    use HasFactory;
    protected $table = 'pidms_pdi_agencies';
    protected $fillable = ['name'];
}
