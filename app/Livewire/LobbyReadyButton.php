<?php

namespace App\Livewire;

use App\Models\Lobby;
use Livewire\Component;

class LobbyReadyButton extends Component
{
    public $lobby;

    public function render()
    {
        if ($this->lobby->players->where('ready')->count() == $this->lobby->players->count())
        {
            return redirect()->to('');
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
}
