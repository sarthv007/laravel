<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Role extends Authenticatable
{
    /**
     * Set timestamps off
     */
    public $timestamps = false;

     /**
     * Get users with a certain role
     */
    public function users()
    {
        return $this->belongsToMany('User');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }
}