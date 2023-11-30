<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdukStoreRequest extends FormRequest
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
            'nama_produk' => 'required|string|min:5|max:50|unique:produks,nama_produk',
            'foto_produk' => 'required|image|mimes:png,jpg,jpeg',
            'keterangan_produk' => 'required|string|min:10|max:255',
            'dibuat' => 'required|string|min:1|max:10',
        ];
    }

    public function message(): array
    {
        return [
            'nama_produk.required' => 'nama produk harus di isi',
            'nama_produk.min' => 'nama produk minimal :min',
            'nama_produk.max' => 'nama produk maksimal :max',
            'nama_produk.unique' => 'nama produk sudah di  gunakan',
            'foto_produk.required' => 'foto produk harus di isi',
            'foto_produk.image' => 'foto produk harus valid',
            'foto_produk.mimes' => 'foto produk harus berjenis :mimes',
            'keterangan_produk.required' => 'keterangan produk harus di isi',
            'keterangan_produk.min' => 'keterangan produk minimal :min',
            'keterangan_produk.max' => 'keterangan produk maksimal :max',
            'dibuat.required' => 'di buat harus di isi',
            'dibuat.min' => 'di buat minimal :min',
            'dibuat.max' => 'di buat maksimal :max',
        ];
    }
}
