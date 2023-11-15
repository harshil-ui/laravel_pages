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


Route::view('/register', 'auth.register')->name('register');

Route::post('/create-user', [UserController::class, 'register'])->name('create-user');

Route::get('/dashboard', [UserController::class, 'dashboard'])->name('home');

Route::view('/login', 'auth.login')->name('login');

Route::post('/post-login', [UserController::class, 'login'])->name('post-login');;
