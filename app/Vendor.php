<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }
    public function vendor()
    {
    	return $this->belongsTo(Vendor::class, 'vendor_id');
    }
    public function images(){
      return $this->hasMany(PrevWorkImage::class, 'service_id', 'id');
    }
     public function view() {
      return $this->belongsTo(View::class, 'id', 'service_id');
    }
     public function logo() {
      return $this->belongsTo(VendorLogo::class, 'vendor_id');
    }
     public function avater() {
      return $this->belongsTo(UserAvater::class, 'user_id');
    }
}
