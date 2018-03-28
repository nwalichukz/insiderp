<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $view
 * @property mixed $user
 * @property mixed $images
 */
class Service extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function view()
    {
        return $this->hasMany(view::class);
    }

    public function images()
    {
        return $this->hasMany(PrevWorkImage::class);
    }
}
