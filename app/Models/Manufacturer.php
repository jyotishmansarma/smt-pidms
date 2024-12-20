<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;
    protected $table = 'pidms_manufacturers';
    protected $fillable = ['name','phone','email','address','cmlno','pidms_user_id'];
    protected $with = ['user'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
