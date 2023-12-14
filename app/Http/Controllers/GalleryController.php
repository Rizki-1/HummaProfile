<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\TargetLayanan;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Models\GaleryProduk;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $target = TargetLayanan::all();
        $gallery = Gallery::latest();
        if ($request->ct) {
            $gallery->where('target_layanan_id', $request->ct);
        }
        $gallery = $gallery->paginate(9);
        return view('admin.gallery.index', compact('gallery', 'target'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try {
            $target = TargetLayanan::all();
            $id = TargetLayanan::findOrFail($request->target_layanan_id)->id;
            return view('admin.gallery.create', compact('target', 'id'));
        } catch (\Exception $e) {
            return redirect()->back()->with('message', [
                'icon' => 'error',
                'title' => 'gagal!',
                'text' => 'Gagal ada kesalahan server'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // \Log::info('Full Request Data:', $request->all());
            dd($request->all());
            $successMessages = [];

            foreach ($request->file('file') as $file) {
                $fotoName = $file->hashName();
                $path = $file->storeAs('galery', $fotoName);

                Gallery::create([
                    'picture' => $fotoName,
                    'target_layanan_id' => $request->target_layanan_id
                ]);

                $successMessages[] = 'File ' . $file->getClientOriginalName() . ' berhasil diunggah.';
            }

            return response()->json(['success' => $successMessages]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function Galeristore(Request $request, $id)
    {
        try {


            $successMessages = [];
            $namefoto = [];

            foreach ($request->file('file') as $file) {
                $fotoName = $file->hashName();
                $path = $file->storeAs('galery', $fotoName);

                Gallery::create([
                    'picture' => $fotoName,
                    'target_layanan_id' => $id
                ]);

                $successMessages[] = 'File ' . $file->getClientOriginalName() . ' berhasil diunggah.';
                $namefoto[] = $fotoName;
            }

            return response()->json(['success' => $successMessages, 'fotoname' => $namefoto]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        // $gallery = Gallery::findOrFail($gallery);
        $target = TargetLayanan::all();
        return view('admin.gallery.edit', compact('gallery', 'target'));
    }

    /**ho
     * Update the specified resource in storage.
     */
    public function update(UpdateGalleryRequest $request, $id)
    {
        try {
            $gallery = Gallery::where('id', $id)->first();
            if (!$gallery) {
                return redirect()->back()->with('message', [
                    'icon' => 'error',
                    'title' => 'gagal!',
                    'text' => 'ID Gallery tidak ditemukan'
                ]);
            }
            if ($request->hasFile('picture')) {
                Storage::delete('galery/' . $gallery->picture);
                $fotoName = $request->file('picture')->hashName();
                $path = $request->file('picture')->storeAs('galery', $fotoName);
            } else {
                $fotoName = $gallery->picture;
            }
            $gallery->picture = $fotoName;
            $gallery->target_layanan_id = $request->target_layanan_id;
            $gallery->save();
            return redirect()->route('gallery.index')->with('message', [
                'icon' => 'success',
                'title' => 'Berhasil!',
                'text' => 'Berhasil mengedit data!'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('message', [
                'icon' => 'error',
                'title' => 'gagal!',
                'text' => 'Gagal ada kesalahan saat meupdate gallery'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        try {
            Storage::delete('galery/' . $gallery->picture);
            $gallery->delete();
            return redirect()->route('gallery.index')->with('message', [
                'icon' => 'success',
                'title' => 'Berhasil!',
                'text' => 'Berhasil menghapus data!'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('message', [
                'icon' => 'error',
                'title' => 'gagal!',
                'text' => 'Gagal ada kesalahan saat menghapus gallery'
            ]);
        }
    }

    public function galeryProduk(Request $request, $id)
    {
        $paths = [];
        $idgalery = [];
        $namefoto = [];

        foreach ($request->file('file') as $file) {
            $fotoName = $file->hashName();
            $path = $file->storeAs('produk_galery', $fotoName);

            $gallery = GaleryProduk::create([
                'produk_id' => $id,
                'galery' => $fotoName,
            ]);


            $paths[] = $path;
            $idgalery[] = $gallery->id;
            $namefoto[] = $fotoName;
        }

        return response()->json(['success' => 'File berhasil diunggah.', 'paths' => $paths, 'id' => $idgalery, 'filename' =>  $namefoto], 200);
    }

    public function deleteProdukGalery(Request $request)
    {
        try {
            $filename = $request->input('filename');
            $ProdukGallery = GaleryProduk::where('galery', $filename)->first();
            Storage::delete('produk_galery/' . $ProdukGallery->galery);
            $ProdukGallery->delete();
            return response()->json(['success' => 'File berhasil di hapus.']);
        } catch (\Exception $e) {
            dd($e);
        }
    }


    public function galeryProdukDelete(Request $request)
    {
        try {
            $filename = $request->input('filename');
            $gallery = Gallery::where('picture', $filename)->first();
            if ($gallery) {
                Storage::delete('produk_galery/' . $gallery->picture);
                $gallery->delete();
                return response()->json(['success' => 'Berhasil menghapus data']);
            } else {
                return response()->json(['error' => 'File tidak ditemukan'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function produkgalerydelete($id)
    {
        try {
            $gallery = GaleryProduk::findOrFail($id);
            Storage::delete('produk_galery/'.$gallery->galery);
            $gallery->delete();
            return redirect()->back()->with('message', [
                'icon' => 'success',
                'title' => 'Berhasil menghapus!',
                'text' => 'data telah terhapus'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with('message', [
                'icon' => 'error',
                'title' => 'gagal!',
                'text' => 'Gagal ada kesalahan saat menghapus data'
            ]);
        }
    }
}
