<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class view extends Model
{
    public function viewOwner()
    {
        return $this->belongsTo('App\Service');
    }
}
