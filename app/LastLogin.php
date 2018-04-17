<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LastLogin extends Model
{
    public function loginUser(){
    	return $this->belongsTo('App\User');
    }
}
