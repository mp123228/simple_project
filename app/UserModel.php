<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    //
    public $table = "user_table";

    public $fillable=
    [
        'id','firstname','lastname','email','password','types','status'
     ];

    

}
