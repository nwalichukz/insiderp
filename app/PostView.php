<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostView extends Model
{
    public function views_post(){
        return $this->belongsTo('App\Post');
    }
}
