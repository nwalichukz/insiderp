<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostLike extends Model
{
    public function likes_post(){
    	$this->belongsTo('App\Post');
    }
}
