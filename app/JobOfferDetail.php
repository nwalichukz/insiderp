<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobOfferDetail extends Model
{
    public function job_owner()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

      public function job_executor()
    {
    	return $this->belongsTo('App\Service', 'service_id');
    }

      public function job_progress()
    {
    	return $this->hasOne(JobProgress::class, 'job_offer_detail_id');
    }
      public function job_approval()
    {
    	return $this->hasOne(JobApproval::class, 'job_offer_detail_id');
    }
    
    public function job_payment()
    {
      return $this->hasOne(JobPayment::class, 'job_offer_detail_id');
    }
      public function job_imagepreview()
    {
    	return $this->hasMany('App\JobImagePreview');
    }
      public function job_dateExtension()
    {
    	return $this->hasMany('App\JobDateExtension', 'service_id');
    }
}
