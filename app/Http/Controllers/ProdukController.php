<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdukRequest;
use App\Http\Requests\ProdukStoreRequest;
use App\Http\Requests\ProdukUpdateRequest;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $produks = Produk::latest();

        if ($request->has('query') && !empty($request->input('query'))) {
            $produks->where('nama_produk', 'LIKE', '%' . $request->input('query') . '%');
        }

        $produks = $produks->paginate(5);

        return view('admin.produk.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProdukRequest $request)
    {
        try {
            DB::beginTransaction();
            $foto_name = $request->file('foto_produk')->hashName();
            $path = $request->file('foto_produk')->storeAs('produk', $foto_name);
            Produk::create([
                'nama_produk' => $request->nama_produk,
                'foto_produk' => $path,
                'keterangan_produk' => $request->keterangan_produk,
                'link' => $request->link,
                'dibuat' => $request->dibuat,
            ]);

            DB::commit();
            return to_route('produk.index')->with('message', [
                'icon' => 'success',
                'title' => "Berhasil!",
                'text' => "Berhasil membuat produk"
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with("message", [
                'icon' => 'error',
                'title' => "Gagal!",
                'text' => "Ada kesalahan saat membuat produk"
            ]);
        }
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
        $produks = Produk::where('id',$id)->first();
        if(!$produks){
            return back()->with('message', [
                'icon' => 'error',
                'title' => 'Error',
                'text' => "ID tidak ditemukan!"
            ]);
        }

        return view('admin.produk.edit', compact('produks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProdukUpdateRequest $request, string $id)
    {
        try {
            DB::beginTransaction();
            $produk = Produk::where('id', $id)->first();
            if(!$produk){
                return back()->with('message', [
                    'icon' => 'error',
                    'title' => "Gagal!",
                    'text' => "Ada kesalahan saat meupdate produk"
                ]);
            }
            $path = $produk->foto_produk;

            if ($request->hasFile('foto_produk')) {
                Storage::delete($produk->foto_produk);
                $photo_name = $request->file('foto_produk')->hashName();
                $path = $request->file('foto_produk')->storeAs('produk', $photo_name);
            }

            $produk->nama_produk = $request->nama_produk;
            $produk->foto_produk = $path;
            $produk->keterangan_produk = $request->keterangan_produk;
            $produk->dibuat = $request->dibuat;
            $produk->link = $request->link;
            $produk->save();

            DB::commit();
            return to_route('produk.index')->with('message', [
                'icon' => 'success',
                'title' => "Berhasil!",
                'text' => "berhasil meupdate produk!"
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('message', [
                'icon' => 'error',
                'title' => "Gagal!",
                'text' => "Ada kesalahan saat meupdate produk"
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

            $produk = Produk::where('id',$id)->first();
            if(!$produk){
                return back()->with('message',[
                'icon' => 'error',
                'title' => 'Error',
                'text' => "ID tidak ditemukan!"
                ]);
            }

            Storage::delete($produk->foto_produk);
            $produk->delete();

            DB::commit();
            return to_route('produk.index')->with('message', [
                'icon' => 'success',
                'title' => "Berhasil!",
                'text' => "Berhasil mehapus produk"
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();

            return back()->with('message', [
                'icon' => 'error',
                'title' => "Gagal!",
                'text' => "Ada kesalahan saat menghapus produk"
            ]);
        }
    }
}
