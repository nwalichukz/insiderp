<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserImage extends Model
{
    public function owner(){
        return $this->belongsTo('App\User');
    }
}
