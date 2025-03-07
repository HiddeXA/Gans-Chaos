<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'gamer_tag',
        'email',
        'password',
        'profile_picture'
    ];

    protected $hidden = [
        'password'
    ];


}
