<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Lobby extends Model
{
    protected $fillable = [
        'name',
        'max_players',
        'current_lobby_id'
    ];

    public function players() : HasMany
    {
        return $this->hasMany(Player::class, 'current_lobby_id');
    }

    public function game() : HasOne
    {
        return $this->hasOne(Game::class, 'lobby_id');
    }

    public function completed()
    {
        if (isset($this->game) && $this->game->game_data['winner'] != null) {
            return true;
        }
        return false;
    }


}
