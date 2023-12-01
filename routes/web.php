<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\PersetujuanController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\LayananPerusahaanController;
use App\Http\Controllers\ProfilePerusahaanController;
use App\Http\Controllers\ViewController;

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
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/persetujuan', function () {
        echo "Hello";
    });
    Route::resource("/berita", BeritaController::class);
    Route::resource("/category-berita", KategoriBeritaController::class);
    Route::resource("/inbox", InboxController::class)->except(['destroy', 'edit', 'update']);
    Route::get('/inbox/reply/{id}', [InboxController::class, 'replyShow'])->name('inbox.reply.show');
    Route::post('/inbox/reply/{id}', [InboxController::class, 'reply'])->name('inbox.reply.post');
    // persetujuan
    Route::get('/persetujuan/siswa', [ViewController::class, 'persetujuanSiswa'])->name('persetujuan.siswa');
    Route::get('/persetujuan/industri', [ViewController::class, 'persetujuanIndustri'])->name('persetujuan.industri');
    //produk
    Route::get('/produk', [ProdukController::class, 'Produkindex'])->name('produk.index');
    Route::get('/produk/create', [ProdukController::class, 'Produkcreate'])->name('produk.create');
    Route::post('/produk.store', [ProdukController::class, 'Produkstore'])->name('produk.store');
    Route::post('/produk/edit/{id}', [ProdukController::class, 'Produkedit'])->name('produk.edit');
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
    Route::resource('/layanan-perusahaan', LayananPerusahaanController::class)->except(['show', 'edit']);
    Route::resource('/profile-perusahaan', ProfilePerusahaanController::class)->only(['index', 'update']);
});

// User Page
Route::get('/', [HomeController::class, 'index'])->name('homeindex');
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/pendidikan/siswa', [HomeController::class, 'indexSiswa'])->name('home.siswaIndex');
Route::get('/pendidikan/industri', [HomeController::class, 'indexIndustri'])->name('home.industriIndex');
Route::get('/produk', [HomeController::class, 'indexProduk'])->name('produkIndex');


//formLandingPage
Route::post('/siswa.store', [FormController::class, 'SiswaMagangStore'])->name('siswa.store');
Route::post('/industri.store', [FormController::class, 'IndustriStore'])->name('industri.store');

//route testing
Route::get('/test', [HomeController::class, 'test'])->name('test');
Route::get('/dashboard', function () {
    return view('admin.dashboard.index');
});
