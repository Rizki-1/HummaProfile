<?php

namespace App\Http\Controllers;

use App\Models\Logo;
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
    public function Profilestore(Request $request)
    {
        ProfileCompany::create([
            'nama_company' => $request->nama_company,
            'alamat' => $request->alamat,
            'detail' => $request->detail,
            'email' => $request->email
        ]);
        return redirect()->back();
    }

    public function SosmedStore(Request $request)
    {
        foreach ($request['category-group'] as $category) {
            $logoFile = $category['logo'];
            $logo_name = $logoFile->hashName();
            $logo = $logoFile->storeAs('sosmed', $logo_name);
            $sosmedStore = [
                'nama_sosmed' => $category['nama_sosmed'],
                'link' => $category['link']
            ];
           $sosmed =  Sosmed::create($sosmedStore);
           $logo = [
            'sosmed_id' => $sosmed->id,
            'foto_logo' => $logo_name
           ];
           Logo::create($logo);
        }
        return redirect()->back();

    }

    public function LayananStore(Request $request,)
    {
        // dd($request->all());
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
    public function Profileupdate(Request $request, string $id)
    {
        // dd($request->email);
        try {
            $profile = ProfileCompany::findOrFail($id);

            $profile->update([
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

    public function SosmedUpdate(Request $request, $id)
    {
        // dd($request->all());
        // try {
            $sosmed = Sosmed::findOrFail($id);
            $logo = Logo::where('sosmed_id', $id)->first();
            if($request->hasFile('logo') && $request->file('logo')->isValid())
            {
                Storage::delete('sosmed/'. $logo->foto_logo);
                $logo_name = $request->file('logo')->hashName();
                $logo_foto = $request->file('logo')->storeAs('sosmed', $logo_name);
            }else{
                $logo_name = $logo->foto_logo;
            }
            $sosmed->update([
                'nama_sosmed' => $request->nama_sosmed,
                'link' => $request->link,
            ]);
            $logo->update([
                'user_id' => $sosmed->id,
                'foto_logo' => $logo_name,
            ]);
            return redirect()->back();
        // } catch (\Throwable $th) {
        //     dd('error');
        //     return redirect()->back();
        // }
    }



    public function LayananUpdate(Request $request, $id)
    {
        try {
            $layanan = LayananPerusahaan::where('target_layanan_id', $id)->delete();
            foreach ($request['category-group'] as $key) {
                // dd($key['layanan']);
                $layanan = [
                    'target_layanan_id' => $id,
                    'layanan' => $key['layanan'],
                ];
                LayananPerusahaan::create($layanan);
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
            $foto_name = Logo::where('sosmed_id', $id)->first();
            Storage::delete('sosmed/'.$foto_name->foto_logo);
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
