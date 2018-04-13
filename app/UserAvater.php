<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAvater extends Model
{

      public function user() {
      return $this->belongsTo(User::class);
    }

     public function images(){
      return $this->hasMany(PrevWorkImage::class, 'service_id', 'id');
    }

     public function view() {
      return $this->belongsTo(view::class, 'id', 'service_id');
    }

     public function logo() {
      return $this->belongsTo(VendorLogo::class, 'id', 'user_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'id', 'user_id');

    }
}
