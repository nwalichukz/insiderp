<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrevWorkImage extends Model
{
    public function prevworkservice()
    {
        return $this->belongsTo('App\Service');
    }
}
