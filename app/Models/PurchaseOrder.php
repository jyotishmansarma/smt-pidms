<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;
    protected $table = [ 'division_id',
                'scheme_id',
                'contractor_id',
                'wordorder_no',
                'status',
                'remarks'];
                
    public function purchase_items()
    {
        return $this->hasMany(PurchaseOrderItem::class);
    }

    public function pdi_certificate()
    {
        return $this->hasMany(PdiCertificate::class);
    }

    

}
