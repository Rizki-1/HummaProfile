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
            'category-group.*.target_layanan_id' => 'required|exists:target_layanans,id|int',
            'category-group.*.layanan' => 'required|min:10|max:255|string',
        ];
    }

    public function message(): array
    {
        return [
            'category-group.*.target_layanan_id.required' => 'target layanan harus di isi',
            'category-group.*.target_layanan_id.exists' => 'target layanan tidak valid',
            'category-group.*.target_layanan_id.int' => 'target layanan tidak valid',
            'category-group.*.layanan.required' => 'layanan harus di isi',
            'category-group.*.layanan.min' => 'layanan minimal :min',
            'category-group.*.layanan.max' => 'layanan maksimal :max',
            'category-group.*.layanan.string' => 'layanan harus valid',
        ];
    }
}
