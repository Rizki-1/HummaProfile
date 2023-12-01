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
    public function index()
    {
        $produks = Produk::paginate(5);

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
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $foto_name = $request->file('foto_produk')->hashName();
            $request->file('foto_produk')->storeAs('produk', $foto_name);
            Produk::create([
                'nama_produk' => $request->nama_produk,
                'foto_produk' => $foto_name,
                'keterangan_produk' => $request->keterangan_produk,
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
        return view('admin.produk.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            DB::beginTransaction();
            $produk = Produk::findOrFail($id);
            $foto_name = $produk->foto_produk;

            if ($request->hasFile('foto_produk')) {
                $foto_name = $request->file('foto_produk')->hashName();
                $request->file('foto_produk')->storeAs('produk', $foto_name);
                Storage::delete('produk/' . $produk->foto_produk);
            }

            $produk->update([
                'nama_produk' => $request->nama_produk,
                'foto_produk' => $foto_name,
                'keterangan_produk' => $request->keterangan_produk,
                'dibuat' => $request->dibuat,
            ]);

            DB::commit();
            return redirect()->back();
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

            $produk = Produk::findOrFail($id);
            Storage::delete('produk/' . $produk->foto_produk);
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
