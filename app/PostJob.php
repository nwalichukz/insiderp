<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostJob extends Model
{
    public function user()
    {
    return $this->belongsTo('App\User');
    }

    public function bidding()
    {
        return$this->hasMany(Bidding::class, 'post_job_id');
    }

    public function hasMadeBid(Service $service)
    {
        if ($this->service->id == $service)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
