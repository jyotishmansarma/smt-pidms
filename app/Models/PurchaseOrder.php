<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Schema;

class PurchaseOrder extends Model
{
    use HasFactory;
    protected $fillable = [ 'division_id',
                'scheme_id',
                'contractor_id',
                'wordorder_no',
                'status',
                'remarks'];

    protected $with = [ 'division', 'scheme', 'contractor', 'purchase_item','pdi_certificate'];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function scheme()
    {
        return $this->belongsTo(Schemes::class, 'scheme_id' , 'scheme_id');
    }

    public function contractor()
    {
        return $this->belongsTo(contractor::class);
    }

    public function purchase_item()
    {
        return $this->hasMany(PurchaseOrderItem::class);
    }

    public function pdi_certificate()
    {
        return $this->hasMany(PdiCertificate::class);
    }

    

}
