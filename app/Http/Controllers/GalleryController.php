<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreGalleryRequest;
use App\Http\Requests\UpdateGalleryRequest;
use App\Models\TargetLayanan;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gallery = Gallery::latest()->paginate(15);
        return view('admin.gallery.index', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $target = TargetLayanan::all();
        return view('admin.gallery.create', compact('target'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGalleryRequest $request)
    {
        // dd($request->all());
       $fotoName = $request->file('picture')->hashName();
       $path = $request->file('picture')->storeAs('galery', $fotoName);
       Gallery::create([
        'picture' => $fotoName,
        'target_layanan_id' => $request->target_layanan_id,
       ]);
       return redirect()->route('gallery.index')->with('message', [
        'icon' => 'success',
        'title' => 'Berhasil!',
        'text' => 'Berhasil menambahkan gallery baru!'
       ]);
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
        return view('admin.gallery.edit', compact('gallery','target'));

    }

    /**ho
     * Update the specified resource in storage.
     */
    public function update(UpdateGalleryRequest $request, Gallery $gallery)
    {
        try {
            if ($request->hasFile('picture')) {
                Storage::delete('gelery/'.$gallery->picture);
                $fotoName = $request->file('picture')->hashName();
                $path = $request->file('picture')->storeAs('galery', $fotoName);
            }else {
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
            Storage::delete('galery/'.$gallery->picture);
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
}
