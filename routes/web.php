<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


//home
Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware(['auth'])->group(function () {

    //dashboard
    Route::get('/dashboard/my-account',  [DashboardController::class, 'my_account'])->name('my_account');
    Route::post('/dashboard/my-account_action',  [DashboardController::class, 'my_account_action'])->name('my_account_action');

    Route::get('/logout', action: [AuthController::class, 'logout'])->name('logout');

    Route::get('/state',  [AuthController::class, 'state'])->name('state');
    Route::post('/state-action', [AuthController::class, 'state_action'])->name('state_action');
});



//auth_actions
Route::post('/register_action', [AuthController::class, 'register_action'])->name('register_action');
Route::post('/login_action', [AuthController::class, 'login_action'])->name('login_action');


//auth_views
Route::get('/register', action: [AuthController::class, 'register'])->name('register');
Route::get('/login', function () {
    return view('auth.login', ['message' => '']);
})->name('login');
Route::get('/forgot-password', function () {
    return view('auth.forgotPassword');
})->name('forgot-password');
