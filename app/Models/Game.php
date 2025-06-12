<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Game extends Model
{
    protected $fillable = [
        'game_data',
        'lobby_id',
    ];

    protected $casts = [
        'game_data' => AsArrayObject::class,
    ];

    public function lobby() : BelongsTo
    {
        return $this->belongsTo(Lobby::class);
    }

    public function completed()
    {
        if ($this->game_data['winner'] != null) {
            return true;
        }
        return false;
    }
}
