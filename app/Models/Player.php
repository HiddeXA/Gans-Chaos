<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Player extends Authenticatable
{
    protected $guarded = ['id'];

    protected $fillable = [
        'gamer_tag',
        'email',
        'password',
        'profile_picture',
        'current_lobby_id',
        'ready',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function resetLobbyArgs()
    {
        $this->current_lobby_id = null;
        $this->ready = false;
        $this->save();
    }


}
