<?php

namespace App\Http\Controllers;

use App\Models\Sosmed;
use Illuminate\Http\Request;
use App\Models\ProfileCompany;
use App\Models\LayananPerusahaan;
use App\Http\Requests\SosmedRequest;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Storage;

class PengaturanController extends Controller
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
    public function Profilestore(ProfileRequest $request)
    {
        ProfileCompany::create([
            'nama_company' => $request->nama_company,
            'alamat' => $request->alamat,
            'detail' => $request->detail,
            'email' => $request->email
        ]);
        return redirect()->back();
    }

    public function SosmedStore(SosmedRequest $request)
    {

        foreach ($request as $sosmed) {
            $logo = $request->file('logo');
            $logo_name = $logo->hasName();
            $logo->storeAs('public/sosmed/'.$logo_name);
            $sosmedStore = [
                'nama_sosmed' => $sosmed->nama_sosmed,
                'logo' => $logo_name,
                'link' => $sosmed->link
            ];
            Sosmed::create($sosmedStore);
        }
        return redirect()->back();
    }

    public function LayananStore(Request $request,)
    {
        foreach ($request['category-group'] as $key ) {
           $layanan = [
            'target_layanan_id' =>  $request->target_id,
            'layanan' => $key['layanan']
           ];
           LayananPerusahaan::create($layanan);
        }
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
    public function Profileupdate(ProfileRequest $request, string $id)
    {
        try {
            $profile = ProfileCompany::findOrFail($id);
            $profie->update([
                'nama_company' => $request->nama_company,
                'alamat' => $request->alamat,
                'detail' => $request->detail,
                'email' => $request->email
            ]);
             return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function SosmedUpdate(SosmedRequest $request)
    {
        try {
            $sosmedModels = Sosmed::all();
            foreach ($sosmedModels as $sosmed_logo) {
                Storage::delete('public/sosmed/' . $sosmed_logo->logo);
            }
            Sosmed::truncate();
            foreach ($request['category-group'] as $key => $sosmed) {
                $logo = $request->file('logo')[$key];
                $logo_name = $logo->hasName();
                $logo->storeAs('public/sosmed/', $logo_name);

                $sosmedStore = [
                    'nama_sosmed' => $sosmed['nama_sosmed'],
                    'logo' => $logo_name,
                    'link' => $sosmed['link'],
                ];

                Sosmed::create($sosmedStore);
            }
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function LayananUpdate(Request $request, $id)
    {
        try {
            $layanan = LayananPerusahaan::where('target_layanan_id', $id)->delete();
            foreach ($request['category-group'] as $key) {
                $layanan = [
                    'target_layanan_id' => $id,
                    'layanan' => $key['layanan'],
                ];
            }
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function Sosmeddestroy(string $id)
    {
        try {
            $sosmed = Sosmed::findOrFail($id);
            Storage::delete('public/logo'.$sosmed->logo);
            $sosmed->delete();
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    public function Layanandelete($id)
    {
        try {
            $layanan = LayananPerusahaan::findOrfail($id);
            $layanan->delete();
            return redirect()->back();
        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }
}
