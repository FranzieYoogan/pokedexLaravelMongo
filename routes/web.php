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

Route::get('/logout', function () {
    return view('logout');
});


Route::post('/', [Controller::class, 'login']);

Route::get('/logout', [Controller::class, 'logout']);