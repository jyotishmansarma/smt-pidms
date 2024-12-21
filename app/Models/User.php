<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;


     protected $table = 'pidms_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'contact_number',
        'user_type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */

        protected $appends = [
            'profile'
        ];

//    protected $with = ['division_users'];
//    public function __construct(array $attributes=[]){
//        parent::__construct($attributes);
//        self::created(function (User $user){
//            if(!$user->roles()->get()->contains(2)){
//                $user->roles()->attach(2);
//            }
//        });
//    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }


    public function hasAnyRole($roles)
    {
        return $this->roles()->whereIn('title', $roles)->exists();
    }

    public function role_user()
    {
        return $this->belongsTo(RoleUser::class,'id','user_id');
    }

    public function dealer(){
        return $this->hasOne(Dealer::class,'pidms_user_id','id');
    }

    public function manufacturer(){
        return $this->hasOne(Manufacturer::class,'pidms_user_id','id');
    }


    public function scopeDealers($query)
    {
        return $query->whereHas('roles', function ($q) {
            $q->where('title', 'Dealer');
        })->with('dealer');
    }

    public function scopeManufacturers($query)
    {
        return $query->whereHas('roles', function ($q) {
            $q->where('title', 'Manufacturer');
        })->with('manufacturer');
    }

    
    public function getProfileAttribute()
    {
        if ($this->roles()->where('title', 'Dealer')->exists()) {
            return $this->dealer()->first();
        }

        if ($this->roles()->where('title', 'Manufacturer')->exists()) {
            return $this->manufacturer()->first();
        }

        return null;
    }




}
