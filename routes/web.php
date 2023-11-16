<?php

use App\Http\Controllers\PageController;
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

    Route::post('/post-login', 'login')->name('post-login');
});


Route::middleware('auth')->group(function () {
    Route::controller(PageController::class)->group(function () {
        Route::get('/', 'index')->name('home');
        Route::view('/create-page', 'pages.form')->name('page-form');
        Route::post('/post-page', 'store')->name('post-page');
        Route::get('/edit-page/{page}', 'edit')->name('edit-page');
        Route::post('/page-update/{page}', 'update')->name('page-update');
        Route::post('/delete-page/{page}', 'delete')->name('delete-page');
    });
});
