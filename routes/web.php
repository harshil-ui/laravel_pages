<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware('guest')->group(function () {
    Route::view('/register', 'auth.register')->name('register');

    Route::view('/login', 'auth.login')->name('login');
});


Route::controller(UserController::class)->group(function () {

    Route::post('/create-user', 'register')->name('create-user');

    Route::get('/', 'dashboard')->name('home')->middleware('auth');

    Route::post('/post-login', 'login')->name('post-login');
});
