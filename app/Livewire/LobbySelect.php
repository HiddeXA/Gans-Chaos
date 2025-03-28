<?php

namespace App\Livewire;

use App\Models\Lobby;
use Livewire\Component;

class LobbySelect extends Component
{
    public $lobbies = [];

    public function render()
    {
        $this->lobbies = Lobby::all();

        return view('livewire.lobby-select');
    }
}
