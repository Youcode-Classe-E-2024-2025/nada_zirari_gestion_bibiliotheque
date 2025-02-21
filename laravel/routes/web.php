<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\EmpruntController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('home');
});
Route::get('/bookdetails', [BookController::class, 'bookdetails'])->name('bookdetails');
// routes/web.php
// Route::get('/books/borrow/{id}', [BookController::class, 'borrow'])->name('borrow.book');
// Route::get('/profile', [EmpruntController::class, 'index'])->name('profile');
Route::post('/borrow', [EmpruntController::class, 'borrow'])->name('borrow');
// Route::post('return/{borrow}', [EmpruntController::class, 'return'])->name('return');


// Authentification
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/profile', [AuthController::class, 'profile'])->name('profile')->middleware('auth');

Route::get('/books', function () {
    return view('create');
})->name('books');

// Dashboard après connexion (page d'accueil des utilisateurs)
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');


Route::get('/', [HomeController::class, 'index'])->name('home');


Route::resource('books', BookController::class);
Route::get('/books/create', [BookController::class, 'create'])->name('create');
