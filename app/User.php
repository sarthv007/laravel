<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use App\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * Get the roles a user has
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function assignRole($role)
    {
        return $this->roles()->save($role);
    }
    
    public function department(){
        return $this->belongsTo('App\Department');
    }  

    public function user(){
        return $this->belongsTo('App\Branch');
    } 

     
}

