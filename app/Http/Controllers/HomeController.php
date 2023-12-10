<?php

namespace App\Http\Controllers;

use App\Models\Mou;
use App\Models\Inbox;
use App\Models\Berita;
use App\Models\BeritaKategori;
use App\Models\CabangPerusahaan;
use App\Models\Gallery;
use App\Models\Produk;
use App\Models\Sosmed;
use App\Models\SiswaMagang;
use Illuminate\Http\Request;
use App\Models\KelasIndustri;
use App\Models\TargetLayanan;
use App\Models\KategoriBerita;
use App\Models\ProfileCompany;
use App\Models\LayananPerusahaan;
use App\Models\Testimoni;

class HomeController extends Controller
{

    // User Controller
    public function index()
    {
        $profile = ProfileCompany::all();
        $berita = Berita::latest()->get();
        $layanan = LayananPerusahaan::latest()->get();
        $produk = Produk::latest()->get();
        $Mous = Mou::all();
        $testimoni = Testimoni::latest()->get();
        $cabang = CabangPerusahaan::all();
        return view('user.index', compact('profile', 'berita', 'layanan', 'produk', 'Mous', 'testimoni', 'cabang'));
    }

    public function home()
    {
        return view('home');
    }

    public function indexSiswa()
    {
        $gallery = Gallery::where('target_layanan_id', 1)->orderBy('created_at', 'desc')->get();
        $testimoni = Testimoni::inRandomOrder()->get();
        $layananSiswa = LayananPerusahaan::where('target_layanan_id', 1)->paginate(4);
        return view('user.pendidikan.siswa', compact('layananSiswa', 'testimoni', 'gallery'));
    }

    public function indexIndustri()
    {
        $gallery = Gallery::where('target_layanan_id', 2)->orderBy('created_at', 'desc')->get();
        $Mous = Mou::all();
        $testimoni = Testimoni::inRandomOrder()->get();
        $layananIndustri = LayananPerusahaan::where('target_layanan_id', 2)->paginate(4);
        return view('user.pendidikan.industri', compact('layananIndustri', 'testimoni', 'Mous', 'gallery'));
    }

    public function indexProduk()
    {
        $produk = Produk::latest()->paginate(9);
        return view('user.produk.index', compact('produk'));
    }

    public function indexContact()
    {
        $profile = ProfileCompany::all();
        return view('user.hubungi.index', compact('profile'));
    }

    public function indexBerita(Request $request)
    {

        $beritaAll =  Berita::with('kategori')->latest()->paginate(9);
        $kategori = KategoriBerita::all();
        return view('user.berita.index', compact('beritaAll', 'kategori'));
    }

    // public function indexLayanan()
    // {
    //     $layanan = LayananPerusahaan::latest()->get();
    //     return view('user.layanan.index', compact('layanan'));
    // }

    public function detailBerita(Request $request, $name)
    {
        $berita = Berita::where('title', $name)->first();
        if(!$berita){
            return abort(404);
        }
        $beritaAll = Berita::all();
        $kategoriBerita = KategoriBerita::all();
        if ($request->input('query')) {
            $beritaAll->where('title',  'LIKE', '%' . $request->input('query') . '%');
        }
        $beritaRandom = Berita::inRandomOrder()->get();
        return view('user.berita.detail', compact('berita', 'beritaAll', 'beritaRandom', 'kategoriBerita'));
    }

    public function detailProduk(string $name) {
        $produk = Produk::with('galery')->where('nama_produk',$name)->first();
        if(!$produk){
            return back();
        }
        $produkLainnya = Produk::inRandomOrder()->get();
        return view('user.produk.detailProduk', compact('produk', 'produkLainnya'));
    }
    // End User Controller

    public function dashboard()
    {
        $produk = Produk::all();
        $produkCount = $produk->count();
        $berita = Berita::all();
        $beritaCount = $berita->count();
        $inboxCount = Inbox::where('status', 1)->count();
        return view('admin.dashboard', compact('inboxCount', 'beritaCount', 'produkCount'));
    }


    public function test()
    {
        $sosmeds = Sosmed::all();
        return view('user.test', compact('sosmeds'));
    }

    public function update()
    {
        $sosmed = Sosmed::all();
        // dd($sosmed);
        return view('admin.editsosmed', compact('sosmed'));
    }
}
