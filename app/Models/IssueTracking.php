<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\SoftDeletes;

class IssueTracking extends Model
{
   // use Searchable;
    use SoftDeletes;
    use HasFactory;
    protected $guarded = [
        'id',
    ];

//    public function toSearchableArray()
//    {
//        return [
//            'issue_type' => $this->issue_type,
//            'description' => $this->description,
//            // Other attributes you want to index
//        ];
//    }

    public function issue_relato_to(){
        return $this->hasOne(IssueType::class,'id','issue_type');
    }
    public function issue_types(){
        return $this->hasOne(SubIssueType::class,'id','sub_issue_type');
    }
    public function assign_histroty()
    {
        return $this->hasOne(AssignHistory::class,'issue_id','id');
    }

    public function issue_status_name(){
        return $this->belongsTo(Status::class,'application_status','id');
    }
    public function documents()
    {
        return $this->hasMany(IssueDocument::class,'issue_id','id');
    }
    public function user_details(){
        return $this->belongsTo(User::class,'users_id','id');
    }

}
