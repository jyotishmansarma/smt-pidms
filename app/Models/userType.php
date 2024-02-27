<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userType extends Model
{
    use HasFactory;

    public function user_types(){
        return $this->belongsTo(User::class,'user_type','id');
    }
}
