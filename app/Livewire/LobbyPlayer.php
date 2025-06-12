<?php

namespace App\Livewire;

use Livewire\Component;

class LobbyPlayer extends Component
{
    public $player;

    public function render()
    {
        return view('livewire.lobby-player');
    }
}
