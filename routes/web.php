<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PromptCaseController;
use App\Http\Controllers\PromptTemplateController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/show', [HomeController::class, 'show'])->name('gallery');
Route::get('/perasia', [HomeController::class, 'home']);
Route::resource('prompt-templates', PromptTemplateController::class);

Route::get('/auth', function () {
    return view('auth');
});

Route::get('/maker', function () {
    return view('maker');
});


Route::middleware(['auth'])->group(function () {
    Route::resource('/prompt-case', PromptCaseController::class);
    Route::post('/prompt-case/{prompt}/favorite', [PromptCaseController::class, 'toggleFavorite'])->name('prompt_case.favorite');
    Route::post('/prompt-case/{prompt}/usage', [PromptCaseController::class, 'incrementUsage'])->name('prompt_case.usage');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [AuthController::class, 'showAuthForm'])->name('profile.show');
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/auth', [AuthController::class, 'showAuthForm'])->name('auth');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
});