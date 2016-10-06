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
        'name', 'role_id', 'photo_id', 'is_active', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /* 
     * Get the role that belongs to user
    */
    public function role(){

        return $this->belongsTo('App\Role');
    }

     /* 
     * Get the photo that belongs to user
    */
    public function photo(){

        return $this->belongsTo('App\Photo');

    }

}
