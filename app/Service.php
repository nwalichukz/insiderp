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
      return $this->hasOne('App\VendorLogo', 'service_id');
    }

     public function avater() {
      $fi = new User;
      return $fi->avater();
    }
}
