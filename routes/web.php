<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::view('/guest', 'guest.index')
    ->name('guest');

Route::resource('items', ItemController::class);