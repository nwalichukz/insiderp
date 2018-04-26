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
        'name', 'email', 'password', 'phone_no', 'state', 'gender', 'location', 'facebook', 'twitter', 'youtube', 'website',
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
        return $this->hasOne('App\Service');
    }

      public function avater() {
      return $this->hasOne('App\UserAvater');
    }

      public function job_detail() {
      return $this->hasMany('App\JobOfferDetail');
    }

       public function user_last_login() {
      return $this->hasMany('App\LastLogin');
    }


}
