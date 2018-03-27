<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'state', 'gender',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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
      return $this->belongsTo(VendorLogo::class, 'user_id');
    }
     public function avater() {
      return $this->belongsTo(UserAvater::class, 'user_id');
    }

    
}
