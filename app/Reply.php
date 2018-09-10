<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    public function replies_comment(){
    	return $this->belongsTo('App\Comment');
    }
}
