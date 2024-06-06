<?php

use App\Http\Controllers\BobotController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\MooraController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::resource('pegawais', PegawaiController::class);

Route::get('/bobot', [BobotController::class, 'index'])->name('bobot.index');


Route::get('/moora', [MooraController::class, 'index'])->name('moora.index');

require __DIR__.'/auth.php';
