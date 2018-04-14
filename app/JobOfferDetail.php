<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobOfferDetail extends Model
{
    public function job_offer()
    {
    	return $this->belongsTo(JobOfferDetail::class, 'service_id');
    }
}
