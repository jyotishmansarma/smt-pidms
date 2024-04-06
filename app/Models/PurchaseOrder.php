<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Schema;

class PurchaseOrder extends Model
{
    use HasFactory;
    protected $fillable = [ 
                'order_id',
                'division_id',
                'scheme_id',
                'contractor_id',
                'workorder_no',
                'order_grand_total',
                'status',
                'is_verified',
                'is_completed',
                'remarks',
                'pidms_user_id'];

    protected $with = [ 'division', 'scheme', 'contractor', 'purchase_item','pdi_certificate', 'pidms_user','postatus'];

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

    public function pidms_user() {
        return $this->belongsTo(User::class,'pidms_user_id','id');
    }

    public function postatus() {
        return $this->hasOne(Status::class,'id','status');
    }

    

}
