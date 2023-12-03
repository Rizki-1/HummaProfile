<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBeritaRequest extends FormRequest
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
            'category.*' => 'exists:kategori_beritas,id|required',
            'thumbnail' => 'required|image|mimes:png,jpg,jpeg',
            'title' => 'required|string|min:5|max:50',
            'description' => 'required|string|min:10|max:255',
        ];
    }


    public function messages()
    {
        return [
            'thumbnail.required' => 'gambar berita harus di isi',
            'thumbnail.image' => 'gambar berita harus valid',
            'thumbnail.mimes' => 'gambar berita harus berjenis :mimes',
            'title.required' => 'judul harus di isi',
            'title.min' => 'judul minimal :min',
            'title.max' => 'judul maksimal :max',
            'description.required' => 'Deskripsi Berita harus di isi',
            'description.min' => 'Deskripsi Berita minimal :min',
            'description.max' => 'Deskripsi Berita maksimal :max',

        ];
    }
}
