<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\BeritaKategori;
use App\Models\PivotBerita;
use Illuminate\Http\Request;
use App\Models\KategoriBerita;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreBeritaRequest;
use App\Http\Requests\UpdateBeritaRequest;
use Illuminate\Validation\ValidationException;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $berita = Berita::with('kategori')->latest();
        if ($request->has('query') && !empty($request->input('query'))) {
            $berita->where('title', 'LIKE', '%' . $request->input('query') . '%');
        }

        $berita = $berita->paginate(1);
        return view("admin.berita.index", compact("berita"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoriBerita = KategoriBerita::all();
        return view("admin.berita.create", compact("kategoriBerita"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBeritaRequest $request)
    {
        // dd($request->all());
        try {
            // Begin database transaction
            DB::beginTransaction();

            $berita = new Berita;
            $berita->title = $request->title;
            $berita->description = $request->description;

            $thumbnailName = $request->file("thumbnail")->hashName();
            $path = $request->file("thumbnail")->storeAs('thumbnail_berita', $thumbnailName);

            $berita->thumbnail = $path;
            $berita->save();

            $kategoriIds = $request->category;
            $berita->kategori()->attach($kategoriIds);

            // Commit the database transaction
            DB::commit();

            return to_route('berita.index')->with('message', [
                'icon' => 'success',
                'title' => 'Berhasil!',
                'text' => 'Berhasil membuat berita!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('message', [
                'icon' => 'error',
                'title' => 'Gagal!',
                'text' => 'Ada kesalahan saat membuat berita!'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategoriBerita = KategoriBerita::all();
        $berita = Berita::where('id', $id)->first();
        return view('admin.berita.edit', compact('kategoriBerita','berita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBeritaRequest $request, $id)
    {
        // dd($request->all());
        try {
            DB::beginTransaction();

            $berita = Berita::findOrFail($id);
            $berita->title = $request->title;
            $berita->description = $request->description;


            if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
                Storage::delete($berita->thumbnail);
                $thumbnailName = $request->file("thumbnail")->hashName();
                $path = $request->file("thumbnail")->storeAs('thumbnail_berita', $thumbnailName);
            } else {
                $path = $berita->thumbnail;
            }
            $berita->thumbnail = $path;
            $berita->save();


            $categoryId = $request->category;
            $berita->kategori()->sync($categoryId);

            DB::commit();

            return redirect()->route('berita.index')->with('message', [
                'icon' => 'success',
                'title' => 'Berhasil!',
                'text' => 'Berhasil mengupdate berita!'
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('message', [
                'icon' => 'warning',
                'title' => 'Gagal!',
                'text' => 'Ada kesalahan server!',
            ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();

            $berita = Berita::where('id', $id)->first();

            if(!$berita){
                return redirect()->back()->with('message', [
                    'icon' => 'warning',
                    'title' => 'gagal!',
                    'text' => 'ada kesalahan gagal menhapus berita, id tidak ditemukan!',
                ]);
            }

            Storage::delete($berita->thumbnail);
            $berita->delete();
            DB::commit();

            return to_route('berita.index')->with('message', [
                'icon' => 'success',
                'title' => 'Berhasil!',
                'text' => 'Berhasil menghapus berita!'
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('message', [
                'icon' => 'warning',
                'title' => 'gagal!',
                'text' => 'ada kesalahan server!',
            ]);
        }
    }

    public function filter(int $id)
    {
        $dataPivot = BeritaKategori::with(['berita', 'kategori'])
            ->whereHas('kategori', function ($query) use ($id) {
                $query->where('kategori_berita_id', $id);
            })
            ->get();

        dump($dataPivot);
    }
}
