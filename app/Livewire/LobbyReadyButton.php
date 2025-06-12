<?php

namespace App\Livewire;

use App\Models\Game;
use App\Models\Lobby;
use Livewire\Component;

class LobbyReadyButton extends Component
{
    public $lobby;

    public function mount() {
        $user = auth()->user();
        $user->ready = false;
        $user->save();
    }

    public function render()
    {
        if ($this->lobby->players->where('ready', true)->count() == $this->lobby->players->count() && auth()->user()->ready)
        {
            if ($this->lobby->game == null) {
                $game = Game::create([
                    'lobby_id' => $this->lobby->id,
                ]);
            }
            $this->redirectToGame();
        }
        return view('livewire.lobby-ready-button');
    }

    public function toggleReady() {
        $user = auth()->user();

        if ($user->ready) {
            $user->ready = false;
            $user->save();
            return;
        }

        $user->ready = true;
        $user->save();
    }

    public function redirectToGame()
    {
        redirect()->route('game',$this->lobby->id);
    }
}
