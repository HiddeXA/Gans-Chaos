<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index($lobbyId) {
        $game = Game::where('lobby_id', $lobbyId)->firstOrFail();

        if (empty($game->game_data)) {
            $positions = [];

            for ($i = 1; $i <= 63; $i++) {
                $positions[$i] = [
                    'players' => [],
                    'number' => $i,
                ];
            }

            foreach ($game->lobby->players as $player) {
                $positions[1]['players'][] = $player;
            }
            $game->game_data = [
                'current_turn' => 0,
                'positions' => $positions,
                'winner' => null
            ];
            $game->save();


        }

        return view('pages/game/index')->with('game', $game);
    }
}
