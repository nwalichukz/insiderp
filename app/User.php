<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'state', 'gender', 'location', 'facebook', 'twitter', 'youtube', 'website',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function service()
    {
        return $this->hasMany(Service::class, 'user_id');
    }

      public function avater() {
      return $this->belongsTo(UserAvater::class, 'id', 'user_id');
    }

     public function images(){
      return $this->hasMany(PrevWorkImage::class, 'service_id', 'id');
    }

     public function view() {
      return $this->belongsTo(view::class, 'id', 'service_id');
    }

     public function logo() {
      return $this->hasMany(VendorLogo::class, 'id', 'user_id');

    }
}
