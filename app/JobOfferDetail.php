<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobOfferDetail extends Model
{
    public function job_owner()
    {
    	return $this->belongsTo('App\User');
    }

      public function job_executor()
    {
    	return $this->belongsTo('App\Service');
    }

     public function job_payment()
    {
    	return $this->hasOne('App\JobPayment');
    }
      public function job_progress()
    {
    	return $this->hasOne('App\JobProgress');
    }
      public function job_approval()
    {
    	return $this->hasOne('App\JobApproval');
    }
      public function job_imagepreview()
    {
    	return $this->hasMany('App\JobImagePreview');
    }
      public function job_dateExtension()
    {
    	return $this->hasMany('App\JobDateExtension');
    }
}
