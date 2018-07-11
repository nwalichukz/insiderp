<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
     public function posts_image_owner(){
        return $this->belongsTo('App\Post');
    }
}
