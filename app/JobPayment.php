<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobPayment extends Model
{
    public function job_payment_owner()
    {
    	return $this->belongsTo('App\JobOfferdetail');
    }
}
