<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeritaStoreRequest extends FormRequest
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
            'title' => 'required|min:5|max:200|unique:beritas,title',
            'description' => 'required|string',
            'thumbnail' => 'required|file|image|max:50000',
            'category' => 'required|array|min:1|exists:kategori_beritas,id',
        ];
    }

    public function messages()
    {
        return [
            'thumbnail.required' => 'Gambar berita harus di isi',
            'thumbnail.image' => 'Gambar berita harus valid',
            'thumbnail.mimes' => 'Gambar berita harus berjenis :mimes',
            'title.required' => 'Judul harus di isi',
            'title.min' => 'Judul minimal :min',
            'title.max' => 'Judul maksimal :max',
            'title.unique' => 'Judul sudah di gunakan',
            'description.required' => 'Deskripsi Berita harus di isi',
            'description.min' => 'Deskripsi Berita minimal :min',
            'description.max' => 'Deskripsi Berita maksimal :max',
            'category.required' => 'kategori berita harus di isi',
            'category.exists' => 'kategori berita harus valid'
        ];
    }
}
