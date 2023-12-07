<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeritaUpdateRequest extends FormRequest
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
        $id = $this->route('beritum');
        return [
            'title' => 'required|string|max:200|unique:beritas,title,' . $id . ',id',
            'description' => 'required|string',
            'thumbnail' => 'nullable|file|image|max:50000',
            'category' => 'required|array|min:1',
        ];
    }

    public function messages()
    {
        return [
            'thumbnail.image' => 'Gambar berita harus valid',
            'title.required' => 'Judul harus di isi',
            'title.min' => 'Judul minimal :min',
            'title.max' => 'Judul maksimal :max',
            'description.required' => 'Deskripsi Berita harus di isi',
            'description.min' => 'Deskripsi Berita minimal :min',
            'description.max' => 'Deskripsi Berita maksimal :max',
        ];
    }
}
