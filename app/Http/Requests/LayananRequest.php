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
            'layanan-group.*.target_layanan_id' => 'required|exists:target_layanans,id',
            'layanan-group.*.layanan' => 'required|min:5|max:255|string',
        ];
    }

    public function messages(): array
    {
        return [
            'layanan-group.*.target_layanan_id.required' => 'target layanan harus di isi',
            'layanan-group.*.target_layanan_id.exists' => 'target layanan tidak valid',
            'layanan-group.*.layanan.required' => 'layanan harus di isi',
            'layanan-group.*.layanan.min' => 'layanan minimal :min',
            'layanan-group.*.layanan.max' => 'layanan maksimal :max',
            'layanan-group.*.layanan.string' => 'layanan harus valid',
        ];
    }
}
