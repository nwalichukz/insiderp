<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAvater extends Model
{
   
      public function avater_owner()
    {
        return $this->belongsTo('App\User');

    }
}
