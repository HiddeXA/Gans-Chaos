<?php

namespace Tests\Feature;

use App\Models\Player;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register()
    {
        $response = $this->postJson('/registreren', [
            'name' => 'TestSpeler',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123'
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'message',
            'redirect'
        ]);

        $this->assertDatabaseHas('players', [
            'gamer_tag' => 'TestSpeler',
            'email' => 'test@example.com'
        ]);
    }

    public function test_user_cannot_register_with_existing_email()
    {
        Player::create([
            'gamer_tag' => 'BestaandeSpeler',
            'email' => 'test@example.com',
            'password' => bcrypt('password123')
        ]);

        $response = $this->postJson('/registreren', [
            'name' => 'NieuweSpeler',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123'
        ]);

        $response->assertStatus(422);
    }

    public function test_user_can_login()
    {
        $player = Player::create([
            'gamer_tag' => 'TestSpeler',
            'email' => 'test@example.com',
            'password' => bcrypt('password123')
        ]);

        $response = $this->postJson('/inloggen', [
            'email' => 'test@example.com',
            'password' => 'password123'
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'message',
            'redirect'
        ]);
    }
}
