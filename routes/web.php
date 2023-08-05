<?php

use App\Http\Livewire\Login;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::view('/', 'home');
Route::view('/', 'home');
// Route::livewire('login', 'login');
Route::get('/login', Login::class)->name('login');