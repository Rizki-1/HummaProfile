<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PengaturanController;

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

// Auth::routes();
Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::prefix('/admin')->middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/persetujuan', function () {
        echo "Hello";
    });
});

Route::get('/', [HomeController::class, 'index'])->name('home');

// profile
Route::post('/profile.store', [PengaturanController::class, 'Profilestore'])->name('profile.store');
Route::put('/profile.update/{id}', [PengaturanController::class, 'Profileupdate'])->name('profile.update');
//sosmed
Route::post('/sosmed.store', [PengaturanController::class, 'SosmedStore'])->name('sosmed.store');
Route::post('/sosmed.update', [PengaturanController::class, 'SosmedUpdate'])->name('sosmed.update');
Route::delete('/sosmed.delete/{id}', [PengaturanController::class, 'Sosmeddestroy'])->name('sosmed.delete');
