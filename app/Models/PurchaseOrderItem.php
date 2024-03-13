<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderItem extends Model
{
    use HasFactory;
    protected $table = [
        'purchase_order_id',
        'producttype_id',
        'product_id',
        'dealer_id',
        'batchno',
        'quantity',
        'price',
        'totalprice'];
}
