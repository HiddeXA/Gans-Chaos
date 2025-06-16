<?php

namespace Tests\Feature;

use App\Models\Player;
use App\Models\Lobby;
use App\Models\Game;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GameControllerTest extends TestCase
{
    use RefreshDatabase;

    private Player $player;
    private Lobby $lobby;

    protected function setUp(): void
    {
        parent::setUp();

        $this->player = Player::create([
            'gamer_tag' => 'TestSpeler',
            'email' => 'test@example.com',
            'password' => bcrypt('password123')
        ]);

        $this->lobby = Lobby::create([
            'name' => 'Test Lobby',
            'max_players' => 4
        ]);
    }

    public function test_unauthorized_user_cannot_view_game()
    {
        $response = $this->get("/spel/{$this->lobby->id}");

        $response->assertRedirect(route('login'));
    }

    public function test_user_cannot_view_nonexistent_game()
    {
        $this->actingAs($this->player, 'player');

        $nonexistentLobbyId = 999;

        $response = $this->get("/spel/{$nonexistentLobbyId}");

        $response->assertStatus(404);
    }
}
