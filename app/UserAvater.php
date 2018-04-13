<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAvater extends Model
{

      public function user() {
      return $this->belongsTo(User::class);
    }

     public function images(){
      return $this->hasMany(PrevWorkImage::class, 'service_id');
    }

     public function view() {
      return $this->belongsTo(view::class, 'service_id');
    }

     public function logo() {
      return $this->belongsTo(VendorLogo::class, 'user_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'user_id');

    }
}
