<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'pidms_permissions';
    
    protected $fillable=[
        'title'
    ];

    public function roles(){
        return $this->belongsToMany(Role::class);
    }
}
