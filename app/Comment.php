<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function comments_post(){
    	return $this->hasOne('App\Post');
    }

    public function reply(){
    	return $this->hasMany('App\Reply');
    }
}
