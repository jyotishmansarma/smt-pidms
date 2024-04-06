<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getStatusColor($name)
    {
        $status_array = [
            "Initiated"   => "primary",
            "Acknowledged" => "success",
            "Verified" => "success",
            "Not Verified" => "danger",
            "On Process" => "warning",
            "PDI Call" => "warning",
            "Delivered" => "success",
            "Received" => "success",
            "Resubmitted" => "warning",
        ];

        return $status_array[$name] ?? "dark";
    }

}
