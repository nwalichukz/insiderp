<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
     public function job_details()
    {
    	return $this->belongsTo(JobOfferDetail::class, 'job_offer_detail_id');
    }

    
}
