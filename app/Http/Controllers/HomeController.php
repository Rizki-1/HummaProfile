<?php

namespace App\Http\Controllers;

use App\Models\Mou;
use App\Models\Inbox;
use App\Models\Berita;
use App\Models\BeritaKategori;
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
        $sosmed = Sosmed::all();
        $profile = ProfileCompany::all();
        $berita = Berita::latest()->get();
        $layanan = LayananPerusahaan::latest()->get();
        $produk = Produk::latest()->get();
        $Mous = Mou::all();
        $testimoni = Testimoni::latest()->get();
        return view('user.index', compact('sosmed', 'profile', 'berita', 'layanan', 'produk', 'Mous', 'testimoni'));
    }

    public function home()
    {
        return view('home');
    }

    public function indexSiswa()
    {
        $testimoni = Testimoni::all();
        $sosmed = Sosmed::all();
        $profile = ProfileCompany::all();
        $layananSiswa = LayananPerusahaan::where('target_layanan_id', 1)->paginate(4);
        return view('user.pendidikan.siswa', compact('sosmed', 'profile', 'layananSiswa', 'testimoni'));
    }

    public function indexIndustri()
    {
        $testimoni = Testimoni::all();
        $sosmed = Sosmed::all();
        $profile = ProfileCompany::all();
        $layananIndustri = LayananPerusahaan::where('target_layanan_id', 2)->paginate(4);
        return view('user.pendidikan.industri', compact('sosmed', 'profile', 'layananIndustri', 'testimoni'));
    }

    public function indexProduk()
    {
        $produk = Produk::latest()->paginate(9);
        $sosmed = Sosmed::all();
        $profile = ProfileCompany::all();
        return view('user.produk.index', compact('sosmed', 'profile', 'produk'));
    }

    public function indexContact()
    {
        $sosmed = Sosmed::all();
        $profile = ProfileCompany::all();
        return view('user.hubungi.index', compact('sosmed', 'profile'));
    }

    public function indexBerita(Request $request)
    {

        $beritaAll =  Berita::with('kategori')->latest()->paginate(2);
        $sosmed = Sosmed::all();
        $profile = ProfileCompany::all();
        $kategori = KategoriBerita::all();
        return view('user.berita.index', compact('beritaAll', 'sosmed', 'profile', 'kategori'));
    }

    public function filterBerita($id)
    {
        try {
            $beritas = BeritaKategori::with(['berita','kategori'])
            ->whereHas('kategori', function ($query) use ($id) {
                $query->where('kategori_berita_id', $id);
            })->paginate(9);
            $sosmed = Sosmed::all();
            $profile = ProfileCompany::all();
            $kategori = KategoriBerita::all();

            return view('user.berita.filterberita', compact('beritas','sosmed','profile','kategori'));
        } catch (\Throwable $th) {
            return  redirect()->back();
        }

    }

    public function indexLayanan()
    {
        $sosmed = Sosmed::all();
        $profile = ProfileCompany::all();
        $layanan = LayananPerusahaan::latest()->get();
        return view('user.layanan.index', compact('sosmed', 'profile', 'layanan'));
    }

    public function detailBerita(Request $request, $id)
    {
        $berita = Berita::FindOrFail($id);
        $sosmed = Sosmed::all();
        $beritaAll = Berita::all();
        $profile = ProfileCompany::all();
        $kategoriBerita = KategoriBerita::all();
        if ($request->input('query')) {
            $beritaAll->where('title',  'LIKE', '%' . $request->input('query') . '%');
        }
        $beritaAll = $beritaAll;
        $beritaRandom = Berita::inRandomOrder()->get();
        return view('user.berita.detail', compact('berita', 'sosmed', 'profile', 'beritaAll', 'beritaRandom', 'kategoriBerita'));
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
