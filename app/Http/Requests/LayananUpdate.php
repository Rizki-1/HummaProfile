<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LayananUpdate extends FormRequest
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
        $id = $this->route('layanan_perusahaan');
        return [
            'nama_layanan' => 'required|min:5|max:255|unique:layanan_perusahaans,nama_layanan,'. $id .',id',
            'descripsi_layanan' => 'required|min:10|max:1000',
            'target_layanan_id' => 'required|exists:target_layanans,id',
        ];
    }

    public function messages()
    {
        return [
            'nama_layanan.required' => 'nama layanan harus di isi',
            'nama_layanan.min' => 'nama layanan minimal :min',
            'nama_layanan.max' => 'nama layanan maksimal :max',
            'descripsi_layanan.required' => 'deskripsi layanan harus di isi',
            'descripsi_layanan.min' => 'deskripsi Layanan minimal :min',
            'descripsi_layanan.max' => 'deskripsi layanan maksimal :max',
            'target_layanan_id.required' => 'target layanan harus di isi',
            'target_layanan_id.exists' => 'target layanan tidak valid',
        ];
    }
}
