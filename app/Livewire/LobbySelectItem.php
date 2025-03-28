<?php

namespace App\Livewire;

use Livewire\Component;

class LobbySelectItem extends Component
{
    public $lobby;

    public function render()
    {
        return view('livewire.lobby-select-item');
    }
}
