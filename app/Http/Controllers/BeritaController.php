<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\StoreBeritaRequest;
use App\Http\Requests\UpdateBeritaRequest;
use App\Models\KategoriBerita;
use App\Models\PivotBerita;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Berita::with('kategori')->paginate(10);
        // dd($berita);
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
            dd($e);
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
    public function edit(Berita $berita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBeritaRequest $request, Berita $berita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita)
    {
        //
    }
}
