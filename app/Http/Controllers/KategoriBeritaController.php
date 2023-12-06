<?php

namespace App\Http\Controllers;

use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = KategoriBerita::latest()->paginate(15);
        return view('admin.berita.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.berita.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // try {
            foreach ($request->input("category-group") as $row) {
                // dd($row['category_name']);
                $kategoriBerita = new KategoriBerita;
                $kategoriBerita->name = $row['category_name'];
                $kategoriBerita->save();
            }
            return to_route('category')->with('message', [
                'icon' => 'success',
                'title' => 'Berhasil!',
                'text' => 'Berhasil membuat kategori berita!'
            ]);
        // } catch (\Exception $e) {
        //     DB::rollBack();
        //     return back()->with('message', [
        //         'icon' => 'error',
        //         'title' => 'Gagal!',
        //         'text' => 'Ada kesalahan saat membuat kategori berita!'
        //     ]);
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = KategoriBerita::findOrFail($id);
        return view('admin.berita.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            DB::beginTransaction();

            $kategoriBerita = KategoriBerita::where('id', $id)->first();
            if(!$kategoriBerita){
                return back()->with('message', [
                    'icon' => 'error',
                    'title' => 'Gagal!',
                    'text' => 'ID kategori berita tidak ditemukan!'
                ]);
            }

            $kategoriBerita->name = $request->category_name;
            $kategoriBerita->save();

            DB::commit();
            return to_route('category')->with('message', [
                'icon' => 'success',
                'title' => 'Berhasil!',
                'text' => 'Berhasil meupdate kategori berita!'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('message', [
                'icon' => 'error',
                'title' => 'Gagal!',
                'text' => 'Ada kesalahan saat meupdate kategori berita!'
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
            $kategoriBerita = KategoriBerita::where('id', $id)->first();
            $nameKategori = $kategoriBerita->name;
            if(!$kategoriBerita){
                return back()->with('message', [
                    'icon' => 'error',
                    'title' => 'Gagal!',
                    'text' => 'ID kategori berita tidak ditemukan!'
                ]);
            }

            $kategoriBerita->delete();

            DB::commit();
            return back()->with('message', [
                'icon' => 'success',
                'title' => 'Berhasil!',
                'text' => "Berhasil mehapus kategori berita $nameKategori"
            ]);
        } catch (\Exception $th) {
            DB::rollBack();
            return back()->with('message', [
                'icon' => 'error',
                'title' => 'Gagal!',
                'text' => 'Ada kesalahan saat mehapus kategori berita!!'
            ]);
        }
    }
}
