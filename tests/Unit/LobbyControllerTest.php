<?php

namespace Tests\Feature;

use App\Models\Player;
use App\Models\Lobby;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LobbyControllerTest extends TestCase
{
    use RefreshDatabase;

    private Player $player;

    protected function setUp(): void
    {
        parent::setUp();

        $this->player = Player::create([
            'gamer_tag' => 'TestSpeler',
            'email' => 'test@example.com',
            'password' => bcrypt('password123')
        ]);
    }

    public function test_user_can_view_lobbies()
    {
        $this->actingAs($this->player, 'player');

        $response = $this->get('/lobbies');

        $response->assertStatus(200);
        $response->assertViewIs('pages.lobby.index');
    }

    public function test_user_can_create_lobby()
    {
        $this->actingAs($this->player, 'player');

        $response = $this->get('/lobby/create');

        $response->assertStatus(302);
        $response->assertRedirect();
    }

    public function test_user_can_join_lobby()
    {
        $this->actingAs($this->player, 'player');

        $lobby = Lobby::create([
            'name' => 'Test Lobby',
            'max_players' => 4
        ]);

        $response = $this->get("/lobby/joined/{$lobby->id}");

        $response->assertStatus(200);
        $response->assertViewIs('pages.lobby.lobby');

        $this->assertEquals($lobby->id, $this->player->fresh()->current_lobby_id);
    }

    public function test_user_cannot_join_full_lobby()
    {
        $this->actingAs($this->player, 'player');

        $lobby = Lobby::create([
            'name' => 'Full Lobby',
            'max_players' => 1
        ]);

        // Voeg een speler toe aan de lobby om deze vol te maken
        $otherPlayer = Player::create([
            'gamer_tag' => 'OtherPlayer',
            'email' => 'other@example.com',
            'password' => bcrypt('password123'),
            'current_lobby_id' => $lobby->id
        ]);

        $response = $this->get("/lobby/joined/{$lobby->id}");

        $response->assertRedirect(route('lobbySelect'));
        $response->assertSessionHas('error', 'Lobby is full');
    }
}
