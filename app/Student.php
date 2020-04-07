<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Student extends Authenticatable
{
	use Notifiable;
	
    protected $table = "students";
   	public $primaryKey = 'id';

    public function Branch(){
        return $this->belongsTo('App\Branch');
    }
    
   	public function Course(){
   		return $this->belongsTo('App\Course');
   	}

   	public function Studentfees(){
   		return $this->hasOne('App\StudentFee');
   	}
}
