<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User extends Controller
{
    //

    protected $fillable=[
        'name','email','password'
    ];

    protected $hidden=[
        'password','remember_token',
    ];

    protected $casts=[
        'email_verified_at' => 'datetime',

    ];
    
}
