<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobProgress extends Model
{
       public function job_progress_owner()
    {
    	return $this->belongsTo('App\JobOfferdetail');
    }
}
