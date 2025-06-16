<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:players,gamer_tag|max:255|min:3',
            'email' => 'required|email|unique:players,email|max:255',
            'password' => 'required|confirmed|min:8|max:255',
            'password_confirmation' => 'required',
        ],
        [
            'name.required' => 'Vul een gebruikersnaam in',
            'name.unique' => 'Deze gebruikersnaam is al in gebruik',
            'name.max' => 'De gebruikersnaam mag maximaal 255 tekens bevatten',
            'name.min' => 'De gebruikersnaam moet minimaal 3 tekens bevatten',
            'email.required' => 'Vul een emailadres in',
            'email.email' => 'Vul een geldig emailadres in',
            'email.unique' => 'Dit emailadres is al in gebruik',
            'email.max' => 'Het emailadres mag maximaal 255 tekens bevatten',
            'password.required' => 'Vul een wachtwoord in',
            'password.confirmed' => 'De wachtwoorden komen niet overeen',
            'password.min' => 'Het wachtwoord moet minimaal 8 tekens bevatten',
            'password.max' => 'Het wachtwoord mag maximaal 255 tekens bevatten',
            'password_confirmation.required' => 'Herhaal het wachtwoord',
        ]);

        $player = Player::create([
            'gamer_tag' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if (isset($request->profile_picture)) {
            $image = $request->file('profile_picture');
            $path = $image->store('profile_images', 'public');
            $player->profile_picture = $path;
            $player->save();
        }


        return response()->json([
            'message' => 'Account aangemaakt',
            'redirect' => route('login'),
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],
        [
            'email.required' => 'Vul een emailadres in',
            'email.email' => 'Vul een geldig emailadres in',
            'password.required' => 'Vul een wachtwoord in',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('player')->attempt($credentials)) {

            $request->session()->regenerate();

            return response()->json([
                'message' => 'Inloggen gelukt',
                'redirect' => route('lobbySelect'),
            ]);
        }

        return response()->json([
            'errors' => [
                'message' => 'Deze gegevens zijn onjuist',
            ],
        ], 401);
    }


}
