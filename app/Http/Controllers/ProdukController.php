<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Requests\ProdukStoreRequest;
use App\Http\Requests\ProdukUpdateRequest;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function Produkstore(ProdukStoreRequest $request)
    {
        $foto_produk = $request->file('foto_produk');
        $foto_name = $foto_produk->hasname();
        $foto_produk->storeAs('public/produk/'. $foto_name);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function Produkupdate(ProdukUpdateRequest $request, string $id)
    {
        try {
            $produk = Produk::findOrFail($id);
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
            $produk->delete();
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}
