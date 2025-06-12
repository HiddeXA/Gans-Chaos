<?php

namespace App\Http\Controllers;

use App\Models\Lobby;
use http\Client\Curl\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class LobbyController extends Controller
{
    public function index()
    {
        $player = auth()->user();
        $player->ready = false;
        $player->current_lobby_id = null;
        $player->save();

        return view('pages/lobby/index');
    }

    public function lobby()
    {
        $lobby = Lobby::findOrFail(request('id'));

        if ($lobby->players->count() >= $lobby->max_players) {
            return redirect()->route('lobbySelect')->with('error', 'Lobby is full');
        }

        $player = auth()->user();
        $player->current_lobby_id = request('id');
        $player->save();

        return view('pages/lobby/lobby')->with('lobby', $lobby);
    }

    public function create()
    {
        $lobby = Lobby::create([
            'name' => auth()->user()->gamer_tag . "'s Lobby",
            'max_players' => 4,
        ]);

        return redirect()->route('lobby', ['id' => $lobby->id]);
    }
}
