<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\QuestionController;

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::view('/guest', 'guest.index')
    ->name('guest');

Route::resource('items', ItemController::class);

// Routes Pertemuan 5: Form Pertanyaan, Respon & Redirect with Flash Data
Route::get('/question', [QuestionController::class, 'create'])
    ->name('question.create');
Route::get('/home', [QuestionController::class, 'create'])
    ->name('home');
Route::post('/question/store', [QuestionController::class, 'store'])
    ->name('question.store');
Route::get('/question/respon', [QuestionController::class, 'respon'])
    ->name('question.respon');
