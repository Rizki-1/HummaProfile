<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_company' => 'required|string|max: 100|min: 5',
            'alamat' => 'required|max: 100|',
            'detail' => 'required|string|max:100',
            'email' => 'required|email:rfc,dns'
        ];
    }

    public function message(): array
    {
        return [
            'nama_company.required' => 'nama perusahaan harus di isi',
            'nama_company.max' => 'nama perusahaan maksimal :max',
            'nama_company.min' => 'nama perusahaan minimal :min',
            'nama_company.string' => 'nama perusahaan harus valid',
            'alamat.required' => 'alamat harus di isi',
            'alamat.max' => 'alamat maksimal :max',
            'detail.required' => 'detail harus di isi',
            'detail.max' => 'detail maksimal :max',
            'email.required' => 'email harus di isi',
            'email.email' => 'email harus valid',
        ];
    }
}
