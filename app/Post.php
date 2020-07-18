<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
     public function user(){
        return $this->belongsTo('App\User');
    }

     public function postimage(){
        return $this->hasOne('App\PostImage', 'post_id');
    }

    public function comment(){
    	return $this->hasMany('App\Comment', 'post_id');
    }

     public function totalComment(){
        return $this->hasMany('App\Comment', 'post_id')->count();
    }

     public function avatar() {
      return $this->belongsTo('App\UserImage', 'user_id', 'id');
    }
}
