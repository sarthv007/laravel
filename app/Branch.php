<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public function user(){
    	return $this->hasOne('App\User');
    }

    public function result(){
    	return $this->hasOne('App\Result');
    }

    public function course(){
    	return $this->hasOne('App\Course');
    }
}
