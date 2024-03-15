<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'purchase_order_id',
        'producttype_id',
        'product_id',
        'is_dealer_exist',
        'dealer_id',
        'batchno',
        'quantity',
        'price',
        'totalprice'];

    protected $with = ['product','product_type', 'dealer' ];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id', 'prod_id');
    }

    public function product_type(){
        return $this->belongsTo(ProductType::class,'producttype_id','id');
    }

    public function dealer() {
        return $this->belongsTo(Dealer::class);
    }

}
