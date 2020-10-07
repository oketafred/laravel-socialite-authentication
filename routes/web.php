<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'visitors'], function () {
    Route::get('/', [AccountController::class, 'getLogin'])->name('getLogin');
    Route::post('/', [AccountController::class, 'processLogin'])->name('login');

    Route::get('/register', [AccountController::class, 'getRegister'])->name('getRegister');
    Route::post('/register', [AccountController::class, 'postRegister'])->name('register');
    Route::get('/forgot-password', function () {
        return view('forgot-password');
    })->name('forgot-password');
});

Route::group(['middleware' => 'authentication'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::post('logout', [AccountController::class, 'logout'])->name('logout');
});
