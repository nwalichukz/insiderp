<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property mixed $service
 */
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
        return $this->hasMany(Service::class);
    }

      public function avater() {
      return $this->hasOne(UserAvater::class);
    }

     public function images(){
      return $this->hasMany(PrevWorkImage::class, 'service_id');
    }

     public function view() {
      return $this->belongsTo(view::class, 'service_id');
    }

     public function logo() {
      return $this->hasMany(VendorLogo::class, 'service_id');

    }
}
