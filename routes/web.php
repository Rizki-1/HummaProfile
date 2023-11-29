<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::prefix('/admin')->group(function () {
    Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class,'showLoginForm']);
    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class,'login'])->name('login');
    Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
    Route::get('/persetujuan', );
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
