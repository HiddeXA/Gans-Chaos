<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Game extends Model
{
    protected $fillable = [
        'players'
    ];

    protected $casts = [
        'players' => 'array'
    ];

    public function lobby() : BelongsTo
    {
        return $this->belongsTo(Lobby::class);
    }
}
