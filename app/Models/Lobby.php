<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lobby extends Model
{
    protected $fillable = [
        'name',
        'max_players',
    ];

    public function players() : HasMany
    {
        return $this->hasMany(Player::class, 'current_lobby_id');
    }


}
