<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $view
 * @property mixed $user
 * @property mixed $images
 */
class Service extends Model
{
   public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function images(){
      return $this->hasMany('App\PrevWorkImage');
    }

     public function view() {
      return $this->hasOne('App\view');
    }

     public function logo() {
      return $this->hasOne('App\VendorLogo');
    }

     public function avater() {
      return $this->hasOne('App\UserAvater');
    }

public function service()
    {
        return $this->hasMany('App\Service');
    }
}
