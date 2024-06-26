<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/result', function () {
    return view('result');
});

Route::get('/header', function () {
    return view('header');
});

Route::get('/logout', function () {
    return view('logout');
});


Route::post('/', [Controller::class, 'login']);

Route::get('/logout', [Controller::class, 'logout']);

Route::get('/dashboard', [Controller::class, 'pokemons']);

Route::post('/dashboard', [Controller::class, 'sendPokemon']);

Route::post('/result', [Controller::class, 'search']);

Route::post('/signup', [Controller::class, 'signup']);