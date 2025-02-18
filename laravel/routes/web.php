<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home');
});


// Authentification
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/profile', [AuthController::class, 'profile'])->name('profile')->middleware('auth');

// Dashboard après connexion (page d'accueil des utilisateurs)
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');