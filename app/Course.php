<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function branch(){
    	return $this->belongsTo('App\Branch');
    }

    public function student(){
    	return $this->hasOne('App\Student');
    }

    public function Studentfees(){
   		return $this->hasOne('App\StudentFee');
   	}

}
