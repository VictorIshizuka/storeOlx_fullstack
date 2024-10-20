<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('/register_action', [AuthController::class, 'register_action'])->name('register_action');
Route::post('/login_action', [AuthController::class, 'login_action'])->name('login_action');
Route::post('/state_action', [AuthController::class, 'state_action'])->name('state_action');


Route::get('/register', action: [AuthController::class, 'register'])->name('register');
Route::get('/state',  [AuthController::class, 'state'])->name('state');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::get('/forgot-password', function () {
    return view('auth.forgotPassword');
})->name('forgot-password');
