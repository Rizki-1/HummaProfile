<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiswaMagangStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required|min:1|max:50',
            'asal_sekolah' => 'required|min:5|max:50',
            'jurusan' => 'in:rpl,tkj,tataboga,mm,stm,ph,akl,pplg|required|min:1',
            'kelas' => 'in:7,8,9,10,11,12|int|required',
            'alamat' => 'required|min:5|max:100',
            'document' => 'required|image|mimes:pdf',
            'email' => 'required|email:rfc,dns|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'nama harus di isi',
            'nama_min' => 'nama minimal :min',
            'nama_max' => 'nama maksimal :max',
            'asal_sekolah.required' => 'asa sekolah harus di isi',
            'asal_sekolah_min' => 'asal sekolah minimal :min',
            'asal_sekolah_max' => 'asal sekolah maksimal :max',
            'jurusan.in' => 'jurusan tidak valid atau belum terdaftar',
            'jurusan.required' => 'jurusan harus di pilih',
            'kelas.in' => 'kelas harus valid :in',
            'kelas.required' => 'kelas harus di isi',
            'alamat.required' => 'alamat harus di isi',
            'alamat.min' => 'alamat minimal :min',
            'alamat.max' => 'alamat maksimal :max',
            'email.required' => 'email harus di isi',
            'email.email' => 'email harus valid :email',
            'email.max' => 'email maksimal :max',
        ];
    }
}
