<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PdiCertificate extends Model
{
    use HasFactory;
    protected $fillable = [
        'purchase_order_id',
        'pdi_agency_id',
        'certificate_no',
        'certificate_date',
        'certificate_file'
    ];

    protected $with = ['pdiagency'];

    public function pdiagency() {
        return $this->belongsTo(PdiAgency::class, 'pdi_agency_id','id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'pdi_agency_id','id');
    }
}
