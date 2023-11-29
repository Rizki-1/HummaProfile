<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
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
Route::put('/sosmed.update', [PengaturanController::class, 'SosmedUpdate'])->name('sosmed.update');
Route::delete('/sosmed.delete/{id}', [PengaturanController::class, 'Sosmeddestroy'])->name('sosmed.delete');
//layanan perusahaan
Route::post('/layanan.store', [PengaturanController::class, 'LayananStore'])->name('layanan.store');
Route::put('/layanan.update', [PengaturanController::class, 'LayananUpdate'])->name('layanan.update');
Route::delete('/layanan.delete', [PengaturanController::class, 'Layanandelete'])->name('layanan.delete');
//produk
Route::post('/produk.store', [ProdukController::class, 'Produkstore'])->name('produk.store');
Route::put('/produk.update', [ProdukController::class, 'Produkupdate'])->name('produk.update');
Route::delete('/produk.delete', [ProdukController::class, 'Produkdestroy'])->name('produk.delete');
