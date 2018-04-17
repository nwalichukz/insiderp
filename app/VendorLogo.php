<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorLogo extends Model
{
      public function logo() {
      return $this->belongsTo('App\Service');
    }
}
