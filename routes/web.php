<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::view('/registreren', 'pages/auth/register');
