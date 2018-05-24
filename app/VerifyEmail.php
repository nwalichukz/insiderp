<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifyEmail extends Model
{
    public function verifyemailUser()
    {
    	return $this->belongs('App\User');
    }
}
