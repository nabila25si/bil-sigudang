<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// admin
Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

// guest
Route::get('/guest', [GuestController::class, 'index'])
    ->name('guest');

Route::resource('items', ItemController::class);
Route::resource('categories', CategoryController::class);
Route::resource('user', UserController::class);
Route::resource('users', UserController::class);

// Routes Pertemuan 5: Form Pertanyaan, Respon & Redirect with Flash Data
Route::get('/question', [QuestionController::class, 'create'])
    ->name('question.create');
Route::get('/home', [QuestionController::class, 'create'])
    ->name('home');
Route::post('/question/store', [QuestionController::class, 'store'])
    ->name('question.store');
Route::get('/question/respon', [QuestionController::class, 'respon'])
    ->name('question.respon');

Route::get('/auth', [AuthController::class, 'showLogin'])->name('login');
Route::post('/auth', [AuthController::class, 'login'])->name('login.process');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
