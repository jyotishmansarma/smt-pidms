<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrderStatus extends Model
{
    use HasFactory;
    protected $table = 'pidms_purchase_order_statuses';
    protected $guarded = ['id'];

}
