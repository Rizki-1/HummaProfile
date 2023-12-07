<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class testimoniRequest extends FormRequest
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
            'nama' => 'required|min:1|max:100|',
            'foto_siswa' => 'image|mimes:png,jpg,jpeg',
            'asal_sekolah' => 'required|min:1|max:50',
            'testimoni' => 'required|min:10|max:255',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'nama harus di isi',
            'nama.min' => 'nama minimal :min',
            'nama.max' => 'nama maximal :max',
            'foto_siswa.required' => 'foto siswa harus di isi',
            'foto_siswa.image' => 'foto siswa harus valid',
            'foto_siswa.mimes' => 'foto siswa harus valid',
            'asal_sekolah.required' => 'asal sekolah harus di isi',
            'asal_sekolah.min' => 'asal sekolah minimal :min',
            'asal_sekolah.max' => 'asal sekolah maksimal :max',
            'testimoni.required' => 'testimoni harus di isi',
            'testimoni.min' => 'testimoni minimal :min',
            'testimoni.max' => 'testimoni maksimal :max',
        ];
    }
}
