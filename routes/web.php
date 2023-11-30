<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\PersetujuanController;
use App\Http\Controllers\KategoriBeritaController;

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
    Route::resource("/berita",BeritaController::class);
    Route::resource("/category-berita",KategoriBeritaController::class);
    Route::resource("/inbox",InboxController::class)->except(['destroy', 'edit', 'update']);
    Route::post('/inbox/reply/{id}', [InboxController::class,'reply'])->name('inbox.reply');
    //produk
    Route::post('/produk.store', [ProdukController::class, 'Produkstore'])->name('produk.store');
    Route::put('/produk.update', [ProdukController::class, 'Produkupdate'])->name('produk.update');
    Route::delete('/produk.delete', [ProdukController::class, 'Produkdestroy'])->name('produk.delete');
    // profile
    Route::post('/profile.store', [PengaturanController::class, 'Profilestore'])->name('profile.store');
    Route::put('/profile.update/{id}', [PengaturanController::class, 'Profileupdate'])->name('profile.update');
    //terima dan tolak kelas industri dan siswa magang
    Route::patch('/terimasiswa/{id}', [PersetujuanController::class, 'setujuSiswaMagang'])->name('setujusiswa');
    Route::patch('/tolaksiswa/{id}', [PersetujuanController::class, 'tolakSiswaMagang'])->name('tolakSiswa');
    Route::patch('/terimaindustri/{id}', [PersetujuanController::class, 'terimaIndustri'])->name('terimaIndustri');
    Route::patch('/tolakindustri/{id}', [PersetujuanController::class, 'tolakIndustri'])->name('tolakindustri');
    //layanan perusahaan
    Route::post('/layanan.store', [PengaturanController::class, 'LayananStore'])->name('layanan.store');
    Route::delete('/layanan.delete/{id}', [PengaturanController::class, 'Layanandelete'])->name('layanan.delete');
    Route::post('/layanan.update/{id}', [PengaturanController::class, 'LayananUpdate'])->name('layanan.update');
    //sosmed
    Route::delete('/sosmed.delete/{id}', [PengaturanController::class, 'Sosmeddestroy'])->name('sosmed.delete');
    Route::post('/sosmed.store', [PengaturanController::class, 'SosmedStore'])->name('sosmed.store');
});

Route::get('/', [HomeController::class, 'index'])->name('homeindex');
Route::get('/home', [HomeController::class, 'home'])->name('home');

//sosmed (belum bisa)
Route::put('/sosmed.update/{id}', [PengaturanController::class, 'SosmedUpdate'])->name('sosmed.update');

//formLandingPage
Route::post('/siswa.store', [FormController::class, 'SiswaMagangStore'])->name('siswa.store');
Route::post('/industri.store', [FormController::class, 'IndustriStore'])->name('industri.store');

//route testing
Route::get('/test', [HomeController::class, 'test'])->name('test');
Route::get('/updatesosmed', [HomeController::class, 'update'])->name('updatesosmed');
Route::get('/layanan', [HomeController::class, 'layanan'])->name('layanan');
Route::get('/layan/{id}', [HomeController::class, 'editlayanan'])->name('layan');
Route::get('/dashboard', function () {
    return view('admin.dashboard.index');
});

