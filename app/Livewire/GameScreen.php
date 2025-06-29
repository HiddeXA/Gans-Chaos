<?php

namespace App\Livewire;

use Livewire\Component;

class GameScreen extends Component
{
    public $positions;

    public $game;

    public $profileImages = [];

    public function mount()
    {
        foreach ($this->game->lobby->players as $player) {
            $this->profileImages[$player->gamer_tag] = $player->profile_picture ??  'images/default-profile-pic.jpg';
        }


    }

    public function render()
    {
        return view('livewire.game-screen');
    }

    public function rollDice()
    {
        $gameData = $this->game->game_data;

        $players = $this->game->lobby->players;

        if ($players[$gameData['current_turn']]->gamer_tag == auth()->user()->gamer_tag ) {
            $randomInt = random_int(1, 6);

            $playerFound = false;

            foreach($gameData['positions'] as $i => $position) {
                foreach ($position['players'] as $j => $player) {
                    if ($player['gamer_tag'] == auth()->user()->gamer_tag) {
                        unset($gameData['positions'][$i]['players'][$j]);
                        $newPositionNumber = $i + $randomInt;

                        if ($newPositionNumber > 63) {
                            $newPositionNumber = 63 - ($newPositionNumber - 63) ;
                        }

                        if ($newPositionNumber == 63) {
                            $gameData['winner'] = $player['gamer_tag'];
                        }

                        $gameData['positions'][$newPositionNumber]['players'][] = $player;

                        $playerFound = true;
                    }
                }
            }

            if (!$playerFound) {
                $gameData['positions'][random_int(1, 6) + 1]['players'][] = auth()->user();
            }

            $nextTurn = $gameData['current_turn'] + 1;

            if ($nextTurn > count($players) - 1)
            {
                $nextTurn = 0;
            }

            $gameData['current_turn'] = $nextTurn;

            $this->game->game_data = $gameData;
            $this->game->save();
        }
    }
}
