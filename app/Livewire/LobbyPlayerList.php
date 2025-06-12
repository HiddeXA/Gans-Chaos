<?php

namespace App\Livewire;

use Livewire\Component;

class LobbyPlayerList extends Component
{
    public $lobby;
    public $players = [];

    public function render()
    {

        $this->players = $this->lobby->players()->get();

        return view('livewire.lobby-player-list');
    }
}
