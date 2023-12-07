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
use App\Http\Controllers\ListController;
use App\Http\Controllers\MouController;
use App\Http\Controllers\ProfilePerusahaanController;
use App\Http\Controllers\TestimoniController;
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
    //kategory berita
    Route::resource('/category-berita', KategoriBeritaController::class);
    Route::get('/category',[KategoriBeritaController::class, 'index'])->name('category');

    Route::get('/category',[KategoriBeritaController::class, 'index'])->name('category');
    Route::resource("/inbox", InboxController::class)->only(['show', 'index', 'destroy']);
    Route::get('/inbox/reply/{id}', [InboxController::class, 'replyShow'])->name('inbox.reply.show');
    Route::post('/inbox/reply/{id}', [InboxController::class, 'reply'])->name('inbox.reply.post');
    // persetujuan
    // Route::get('/persetujuan/siswa', [ViewController::class, 'persetujuanSiswa'])->name('persetujuan.siswa');
    // Route::get('/persetujuan/industri', [ViewController::class, 'persetujuanIndustri'])->name('persetujuan.industri');
    //produk
    Route::resource('/produk', ProdukController::class);
    // profile
    Route::post('/profile.store', [PengaturanController::class, 'Profilestore'])->name('profile.store');
    Route::put('/profile.update/{id}', [PengaturanController::class, 'Profileupdate'])->name('profile.update');
    //terima dan tolak kelas industri dan siswa magang
    // Route::patch('/terimasiswa/{id}', [PersetujuanController::class, 'setujuSiswaMagang'])->name('setujusiswa');
    // Route::patch('/tolaksiswa/{id}', [PersetujuanController::class, 'tolakSiswaMagang'])->name('tolakSiswa');
    // Route::patch('/terimaindustri/{id}', [PersetujuanController::class, 'terimaIndustri'])->name('terimaIndustri');
    // Route::patch('/tolakindustri/{id}', [PersetujuanController::class, 'tolakIndustri'])->name('tolakindustri');
    //layanan perusahaan
    Route::resource('/layanan-perusahaan', LayananPerusahaanController::class)->except(['show']);
    Route::resource('/profile-perusahaan', ProfilePerusahaanController::class)->only(['index', 'update']);
    // List
    Route::get('/list-siswa-magang', [ListController::class, 'siswaMagang'])->name('list.siswa_magang');
    Route::delete('/list-siswa-magang/{id}', [ListController::class, 'siswaMagangDel'])->name('list.siswa_magang.del');
    Route::get('/list-kelas-industri', [ListController::class, 'kelasIndustri'])->name('list.kelas_industri');
    Route::delete('/list-kelas-industri/{id}', [ListController::class, 'kelasIndustriDel'])->name('list.kelas_industri.del');
    //Mou
    Route::resource('/mou', MouController::class)->except(['show']);
    //testimoni
    Route::resource('testimoni', TestimoniController::class)->except(['show']);
});

// User Page
Route::get('/', [HomeController::class, 'index'])->name('homeindex');
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/pendidikan/siswa', [HomeController::class, 'indexSiswa'])->name('home.siswaIndex');
Route::get('/pendidikan/industri', [HomeController::class, 'indexIndustri'])->name('home.industriIndex');
Route::get('/produk', [HomeController::class, 'indexProduk'])->name('produkIndex');
Route::get('/contact', [HomeController::class, 'indexContact'])->name('contactIndex');
Route::get('/berita', [HomeController::class, 'indexBerita'])->name('beritaIndex');
Route::get('/berita/{name}', [HomeController::class, 'detailBerita'])->name('detailBerita');
Route::post('/inbox', [InboxController::class,'store'])->name('inbox.store');
Route::get('/layanan', [HomeController::class, 'indexLayanan'])->name('layananIndex');
Route::get('/produk/{id}', [HomeController::class, 'detailProduk'])->name('produk.detail');
Route::get('/category-berita/{id}', [BeritaController::class, 'filter'])->name('filter-category');

//formLandingPage
Route::post('/siswa.store', [FormController::class, 'SiswaMagangStore'])->name('siswa.store');
Route::post('/industri.store', [FormController::class, 'IndustriStore'])->name('industri.store');


//route testing
Route::get('/test', [HomeController::class, 'test'])->name('test');

Route::fallback(function(){
    return back();
});
