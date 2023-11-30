<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndustriStore extends FormRequest
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
            'nama_industri' => 'required|min:5|max:100|unique:kelas_industris,nama_industri',
            'jenis' => 'required|min:5|max:10',
            'email' => 'required|email:rfc,dns|max:100',
            'alamat' => 'required|min:10|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'nama_industri.required' => 'nama industri harus di isi',
            'nama_industri.min' => 'nama industri minimal :min',
            'nama_industri.max' => 'nama industri maksimal :max',
            'nama_industri.unique' => 'nama industri sudah terdaftar',
            'jenis.required' => 'jenis harus di isi',
            'jenis.min' => 'jenis minmal :min',
            'jenis.max' => 'jenis maxmal :max',
            'email.required' => 'email harus di isi',
            'email.email' => 'email harus valid',
            'email.max' => 'email maksimal :max',
            'alamat.required' => 'alamat harus di isi',
            'alamat.min' => 'alamat minmal :min',
            'alamat.max' => 'alamat maksimal :max'
        ];
    }
}
