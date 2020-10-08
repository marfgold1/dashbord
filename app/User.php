<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'date_of_birth', 'category', 'avatar', 'role_id'
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

    public function isRegisteredInWebinar(Webinar $webinar){
        return $this->webinars->contains($webinar);
    }

    public function webinars() {
        return $this->belongsToMany(Webinar::class);
    }

    public function createdWebinars(){
        return $this->hasMany(Webinar::class);
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function hasPermission($permission) {
        return $this->role->permissions()->where('name', $permission)->first() ?: false;
    }
}
