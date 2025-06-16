<?php

namespace Tests\Unit;

use App\Models\Game;
use App\Models\Lobby;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GameTest extends TestCase
{
    use RefreshDatabase;

    public function test_game_completed_with_winner()
    {
        $lobby = Lobby::create([
            'name' => 'Test Lobby',
            'max_players' => 4,
        ]);
        $game = Game::create([
            'game_data' => ['winner' => 1],
            'lobby_id' => $lobby->id,
        ]);

        $this->assertTrue($game->completed());
    }

    public function test_game_not_completed_without_winner()
    {
        $lobby = Lobby::create([
            'name' => 'Test Lobby',
            'max_players' => 4,
        ]);
        $game = Game::create([
            'game_data' => ['winner' => null],
            'lobby_id' => $lobby->id,
        ]);

        $this->assertFalse($game->completed());
    }

    public function test_game_belongs_to_lobby()
    {
        $lobby = Lobby::create([
            'name' => 'Test Lobby',
            'max_players' => 4,
        ]);

        $game = Game::create([
            'game_data' => ['winner' => null],
            'lobby_id' => $lobby->id,
        ]);

        $this->assertInstanceOf(Lobby::class, $game->lobby);
        $this->assertEquals($lobby->id, $game->lobby->id);
    }
}
