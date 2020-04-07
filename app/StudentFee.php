<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentFee extends Model
{
    public function Student(){
    	return $this->belongsTo('App\Student');
    }

    public function course(){
    	return $this->belongsTo('App\Course');
    }

}
