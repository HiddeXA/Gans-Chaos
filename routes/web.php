<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LobbyController;
use App\Http\Controllers\GameController;
use App\Http\Middleware\AuthRedirect;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('lobbySelect');
});

Route::group(['middleware' => AuthRedirect::class], function () {
    Route::view('/registreren', 'pages/auth/register')->name('register');
    Route::post('/registreren', [AuthController::class, 'register']);

    Route::view('/inloggen', 'pages/auth/login')->name('login');
    Route::post('/inloggen', [AuthController::class, 'login']);
});

Route::group(['middleware' => 'auth:player'], function () {
    Route::get('/lobbies', [LobbyController::class, 'index'])->name('lobbySelect');
    Route::get('/lobby/joined/{id}', [LobbyController::class, 'lobby'])->name('lobby');
    Route::get('/lobby/create', [LobbyController::class, 'create'])->name('createLobby');
    Route::get('/spel/{lobbyId}', [GameController::class, 'index'] )->name('game');
});
