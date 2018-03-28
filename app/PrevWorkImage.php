<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrevWorkImage extends Model
{
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
