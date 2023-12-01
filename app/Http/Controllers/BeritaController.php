<?php

namespace App\Http\Controllers;

use App\Models\Berita;
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
    public function index()
    {
        $berita = Berita::with('kategori')->paginate(15);
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
    public function edit(Berita $berita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $berita)
    {
        try {
            $berita->title = $request->title;
            $berita->description = $request->description;
            if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
                Storage::delete('thumbnail/'.$berita->thumbnail);
                $thumbnailName = $request->file('thumbnail')->hashName();
                $thumbnail = $request->file('thumbnail')->storeAs('thumbnail', $thumbnailName);
            }else{
                $thumbnailName = $berita->thumbnail;
            }
            $berita->thumbnail = $thumbnailName;
            $berita->save();

            $categoryId = $request->category;
            $berita->kategori->attach($categoryId);

            return to_route('berita.index')->with('message', [
                'icon' => 'success',
                'title' => 'Berhasil!',
                'text' => 'Berhasil mengupdate berita!'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('message', [
                'icon' => 'warning',
                'title' => 'gagal!',
                'text' => 'ada kesalahan  server!',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita)
    {
        try {
            Storage::delete('thumbnail/'.$berita->thumbnail);
            $berita->delete();
            return to_route('berita.index')->with('message', [
                'icon' => 'success',
                'title' => 'Berhasil!',
                'text' => 'Berhasil mengupdate berita!'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('message', [
                'icon' => 'warning',
                'title' => 'gagal!',
                'text' => 'ada kesalahan  server!',
            ]);
        }
    }
}
