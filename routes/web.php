<?php

use App\Http\Controllers\SiteMapController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CabangPerusahaanController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\PersetujuanController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\LayananPerusahaanController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\MouController;
use App\Http\Controllers\OperationalTimeController;
use App\Http\Controllers\ProfilePerusahaanController;
use App\Http\Controllers\SyaratKetentuanController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\ViewController;
use App\Models\OperationalTime;

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
Route::get('/sitemap-ini', SiteMapController::class);
Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::prefix('/admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('reset-password', [ChangePasswordController::class, 'showForm'])->name('form-change-pass');
    Route::post('reset-password', [ChangePasswordController::class, 'changePass'])->name('change-pass');
    Route::get('/persetujuan', function () {
        echo "Hello";
    });
    Route::resource("/berita", BeritaController::class);
    //kategory berita
    Route::resource('/category', KategoriBeritaController::class);
    Route::resource("/inbox", InboxController::class)->only(['show', 'index', 'destroy']);
    Route::get('/inbox/reply/{id}', [InboxController::class, 'replyShow'])->name('inbox.reply.show');
    Route::post('/inbox/reply/{id}', [InboxController::class, 'reply'])->name('inbox.reply.post');

    //produk
    Route::resource('/produk', ProdukController::class);
    Route::post('/galery-produk-delete-drop', [GalleryController::class, 'deleteProdukGalery'])->name('galery-produk.deleteProduk');
    Route::post('/galery-produk/{id}', [GalleryController::class, 'galeryProduk'])->name('galeryproduk.store');
    Route::get('/galery-produk/{id}/store', [ProdukController::class, 'galeryProduk'])->name('galeryproduk.create');
    Route::delete('/produk-galery/{id}', [GalleryController::class, 'produkgalerydelete'])->name('delete.galeryproduk');

    //layanan perusahaan
    Route::resource('/layanan-perusahaan', LayananPerusahaanController::class)->except(['show']);
    Route::resource('/cabang-perusahaan', CabangPerusahaanController::class)->except(['show']);
    Route::resource('/profile-perusahaan', ProfilePerusahaanController::class)->only(['index', 'update']);
    // List
    Route::get('/list-siswa-magang', [ListController::class, 'siswaMagang'])->name('list.siswa_magang');
    Route::delete('/list-siswa-magang/{id}', [ListController::class, 'siswaMagangDel'])->name('list.siswa_magang.del');
    Route::get('/list-kelas-industri', [ListController::class, 'kelasIndustri'])->name('list.kelas_industri');
    Route::delete('/list-kelas-industri/{id}', [ListController::class, 'kelasIndustriDel'])->name('list.kelas_industri.del');
    //Gallery
    Route::post('/galery-produk-delete', [GalleryController::class, 'galeryProdukDelete'])->name('galeryproduk.delete');
    Route::resource('/gallery', GalleryController::class)->except(['show']);
    Route::post('/storeGalery/{id}', [GalleryController::class, 'Galeristore'])->name('idgalery');
    // Syarat dan ketentuan
    Route::resource('/syarat-dan-ketentuan', SyaratKetentuanController::class)->except(['show']);
    //Mou
    Route::resource('/mou', MouController::class)->except(['show']);
    //testimoni
    Route::resource('/testimoni', TestimoniController::class)->except(['show']);
    //operational
    Route::resource('/operational', OperationalTimeController::class)->except(['show','destroy','store']);
    Route::post('/operationalCloseProccess', [OperationalTimeController::class, 'closeProccess'])->name('operational.closeProccess');
    Route::post('/operational/{id}/open', [OperationalTimeController::class, 'operationalOpen'])->name('operational.open');
    Route::get('/operationalCloseAll', [OperationalTimeController::class, 'operationalCloseAll'])->name('operational.closeall');
    Route::get('/operationalOpenAll', [OperationalTimeController::class, 'operationalOpenAll'])->name('operational.openall');
    Route::get('/operational/{id}/close', [OperationalTimeController::class, 'operationalClose'])->name('operational.close');
    Route::get('operational/{id}/detail', [OperationalTimeController::class, 'operationalDetail'])->name('detail.operational');
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
Route::get('/gallery/magang', [HomeController::class, 'galleryMagang'])->name('gallery.magang');
Route::get('/gallery/industri', [HomeController::class, 'galleryIndustri'])->name('gallery.industri');
Route::post('/inbox', [InboxController::class,'store'])->name('inbox.store');
// Route::get('/layanan', [HomeController::class, 'indexLayanan'])->name('layananIndex');
Route::get('/produk/{name}', [HomeController::class, 'detailProduk'])->name('produk.detail');
Route::get('/category/{name}', [BeritaController::class, 'filter'])->name('filter-category');

//route testing
Route::get('/test', [HomeController::class, 'test'])->name('test');

Route::fallback(function(){
    return back();
});
