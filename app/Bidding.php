<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidding extends Model
{
    public function service(){
    	return $this->belongsTo('App\Service', 'service_id');
    }
    public function postJob()
    {
    	return $this->belongsTo('App\PostJob', 'post_job_id');
    }

}
