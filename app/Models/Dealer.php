<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    use HasFactory;
    protected $table = 'pidms_dealers';
    protected $guarded = ['id'];

    public function user() {
        $this->belongsTo(User::class);
    }

}
