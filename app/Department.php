<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = "departments";
    protected $primaryKey = "id";
    

  	public function user(){
        return $this->hasOne('App\User');
    } 
}
