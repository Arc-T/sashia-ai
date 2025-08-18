<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/show', [HomeController::class, 'show'])->name('gallery');
Route::get('/perasia', [HomeController::class, 'home']);

Route::get('/auth', function () {
    return view('auth');
});

Route::get('/maker', function () {
    return view('maker');
});

Route::get('/saved-prompts', function () {
    return view('saved-prompts');
});


// Protected Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [AuthController::class, 'showAuthForm'])->name('profile.show');

});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/auth', [AuthController::class, 'showAuthForm'])->name('auth');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
});