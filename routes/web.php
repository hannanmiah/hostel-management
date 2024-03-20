<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Volt::route('/', 'home')->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::prefix('hostels')->group(function () {
    Volt::route('/', 'pages.hostels.index')->name('hostels.index');
    Volt::route('/{hostel}', 'pages.hostels.view')->name('hostels.view');
});

require __DIR__.'/auth.php';
