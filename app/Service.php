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
        return $this->belongsTo(User::class);
    }

    public function images(){
      return $this->hasMany(PrevWorkImage::class, 'service_id');
    }

     public function view() {
      return $this->belongsTo(view::class,  'service_id');
    }

     public function logo() {
      return $this->belongsTo(VendorLogo::class, 'service_id');
    }

     public function avater() {
      return $this->hasOne(UserAvater::class,  'user_id');
    }

public function service()
    {
        return $this->hasMany(Service::class, 'user_id');
    }
}
