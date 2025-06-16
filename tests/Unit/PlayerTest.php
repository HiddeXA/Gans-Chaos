<?php

namespace Tests\Unit;

use App\Models\Lobby;
use App\Models\Player;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlayerTest extends TestCase
{
    use RefreshDatabase;

    public function test_reset_lobby_args()
    {
        $lobby = Lobby::create([
            'name' => 'Test Lobby',
            'max_players' => 4
        ]);

        $player = Player::create([
            'gamer_tag' => 'TestSpeler',
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
            'current_lobby_id' => $lobby->id,
            'ready' => true
        ]);

        $player->resetLobbyArgs();
        $this->assertNull($player->fresh()->current_lobby_id);
        $this->assertFalse($player->fresh()->ready);
    }

    public function test_hidden_attributes()
    {
        $player = Player::create([
            'gamer_tag' => 'TestSpeler',
            'email' => 'test@example.com',
            'password' => bcrypt('password123')
        ]);

        $playerArray = $player->toArray();

        $this->assertArrayNotHasKey('password', $playerArray);
        $this->assertArrayNotHasKey('remember_token', $playerArray);
    }
}
