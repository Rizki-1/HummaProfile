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

    public function SosmedUpdate(Request $request)
    {
        try {
            $sosmedModels = Sosmed::all();

            foreach ($request['category-group'] as $key => $sosmed) {
                $logo_name = ''; // Inisialisasi variabel logo_name

                // Periksa apakah kunci ada di $sosmedModels
                if (isset($sosmedModels[$key])) {
                    $sosmedkey = $sosmedModels[$key];
                    $logo_foto = Logo::where('sosmed_id', $sosmedkey->id)->first();
                    $sosmeddata = Sosmed::where('id', $sosmedkey->id)->first();

                    // Jika ada inputan foto baru, gunakan foto baru
                    if ($request->hasFile('logo') && $request->file('logo')[$key]->isValid()) {
                        // Hapus logo yang sudah ada
                        Storage::delete('sosmed/' . $logo_foto->foto_logo);

                        // Upload logo baru
                        $logo = $request->file('logo')[$key];
                        $logo_name = $logo->hashName();
                        $logo->storeAs('sosmed', $logo_name);
                    } else {
                        // Jika tidak ada inputan foto baru, gunakan foto lama
                        $logo_name = $logo_foto->foto_logo;
                    }

                    // Perbarui data Sosmed yang sudah ada
                    $sosmeddata->update([
                        'nama_sosmed' => $sosmed['nama_sosmed'],
                        'link' => $sosmed['link'],
                    ]);
                } else {
                    // Jika tidak ada data yang sudah ada, buat data Sosmed baru
                    $sosmedstore = Sosmed::create([
                        'nama_sosmed' => $sosmed['nama_sosmed'],
                        'link' => $sosmed['link'],
                    ]);

                    // Jika ada inputan foto baru, buat data Logo baru
                    if ($request->hasFile('logo') && $request->file('logo')[$key]->isValid()) {
                        $logo = $request->file('logo')[$key];
                        $logo_name = $logo->hashName();
                        $logo->storeAs('sosmed', $logo_name);

                        Logo::create([
                            'sosmed_id' => $sosmedstore->id,
                            'foto_logo' => $logo_name,
                        ]);
                    }
                }
            }

            return redirect()->back();
        } catch (\Throwable $th) {
            dd('error');
            return redirect()->back();
        }
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
