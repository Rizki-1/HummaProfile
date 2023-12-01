<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Requests\ProdukRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProdukStoreRequest;
use App\Http\Requests\ProdukUpdateRequest;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function Produkindex()
    {
        $produks = Produk::paginate(5);

        return view('admin.produk.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function Produkcreate()
    {
        return view('admin.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function Produkstore(Request $request)
    {
        // dd($request->foto_produk);
        $foto_name = $request->file('foto_produk')->hashName();
        $foto_produk = $request->file('foto_produk')->storeAs('produk', $foto_name);
        Produk::create([
            'nama_produk' => $request->nama_produk,
            'foto_produk' => $foto_name,
            'keterangan_produk' => $request->keterangan_produk,
            'dibuat' => $request->dibuat,
        ]);

        return redirect()->back();
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
    public function Produkedit(string $id)
    {
        return view('admin.produk.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function Produkupdate(Request $request, string $id)
    {
        try {
            $produk = Produk::findOrFail($id);
            $foto_name = $produk->foto_produk;

            if ($request->hasFile('foto_produk')) {
                $foto_name = $request->file('foto_produk')->hashName();
                $foto_produk = $request->file('foto_produk')->storeAs('produk', $foto_name);
                Storage::delete('produk/' . $produk->foto_produk);
            }

            $produk->update([
                'nama_produk' => $request->nama_produk,
                'foto_produk' => $foto_name,
                'keterangan_produk' => $request->keterangan_produk,
                'dibuat' => $request->dibuat,
            ]);

            return redirect()->back();
        } catch (\Throwable $th) {

            return redirect()->back();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function Produkdestroy(string $id)
    {
        try {
            $produk = Produk::findOrFail($id);
            Storage::delete('produk/' . $produk->foto_produk);
            $produk->delete();
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}
