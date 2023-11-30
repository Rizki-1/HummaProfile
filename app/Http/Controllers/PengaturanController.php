<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use App\Models\Sosmed;
use Illuminate\Http\Request;
use App\Models\ProfileCompany;
use App\Models\LayananPerusahaan;
use App\Http\Requests\SosmedRequest;
use App\Http\Requests\LayananRequest;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Storage;

class PengaturanController extends Controller
{

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

    public function LayananStore(LayananRequest $request,)
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

    public function Profileupdate(ProfileRequest $request, string $id)
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

    public function SosmedUpdate(SosmedRequest $request, $id)
    {

        try {
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
        } catch (\Throwable $th) {
            dd('error');
            return redirect()->back();
        }
    }



    public function LayananUpdate(LayananRequest $request, $id)
    {
        try {
            $layanan = LayananPerusahaan::where('target_layanan_id', $id)->delete();
            foreach ($request['category-group'] as $key) {
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
