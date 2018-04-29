<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobApproval extends Model
{
      public function job_approval_owner()
    {
    	return $this->belongsTo('App\JobOfferDetail', 'job_offer_detail_id');
    }
}
