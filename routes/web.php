<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;


Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::view('/guest', 'guest.index')
    ->name('guest');