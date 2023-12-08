<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LayananRequest extends FormRequest
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
            'target_layanan_id' => 'required|exists:target_layanans,id',
            'layanan' => 'required|min:5|max:255|string|unique:layanan_perusahaans,nama_layanan||distinct',
            'foto_layanan' => 'required',
            'descripsi_layanan' => 'required|min:5|max:1000|string',
        ];
    }

    public function messages(): array
    {
        return [
            'target_layanan_id.required' => 'target layanan harus di isi',
            'target_layanan_id.exists' => 'target layanan tidak valid',
            'layanan.required' => 'layanan harus di isi',
            'layanan.min' => 'layanan minimal :min',
            'layanan.max' => 'layanan maksimal :max',
            'layanan.string' => 'layanan harus valid',
            'layanan.unique' => 'layanan ini sudah digunakan',
        ];
    }
}
