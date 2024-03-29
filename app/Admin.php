<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use Notifiable;

        protected $guard = 'admin';

        protected $fillable = [
            'name', 'email', 'password','is_super','active'
        ];

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
}