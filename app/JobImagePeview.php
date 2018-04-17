<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobImagePeview extends Model
{
       public function job_imagepreview_owner()
    {
    	return $this->belongsTo('App\JobOfferdetail');
    }
}
