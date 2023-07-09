<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable {

    use Notifiable,
        SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_id','franchise_id','coupen_used','name', 'user_name', 'email', 'password', 'image', 'phone','countryCode', 'active_token', 'reset_token', 'status','payment_status','subscription_date','subscription_end','currency','payment_id', 'last_login_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public function setEmailAttribute($value) {
        $this->attributes['email'] = strtolower($value);
    }

    public function getFullNameAttribute() {
        return "{$this->name}";
    }

    

}
