<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PdiCertificate extends Model
{
    use HasFactory;
    protected $fillable = [
        'purchase_order_id',
        'agency_name',
        'certificate_no',
        'certificate_date',
        'certificate_file'
    ]
}
