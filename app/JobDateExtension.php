<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobDateExtension extends Model
{
       public function date_extension_owner()
    {
    	return $this->belongsTo('App\JobOfferdetail');
    }
}
