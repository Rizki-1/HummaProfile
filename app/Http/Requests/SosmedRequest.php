<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SosmedRequest extends FormRequest
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
            'category-group.*.nama_sosmed' => 'required|string|max:50|min:1',
            'category-group.*.logo' => 'required|image|mimes:jpeg,png,jpg',
            'category-group.*.link' => 'required|max:30|min:5',
        ];
    }

    public function messages(): array
    {
        return [
            'category-group.*.nama_sosmed.required' => 'nama sosmed harus di isi',
            'category-group.*.nama_sosmed.max' => 'nama sosmed maksimal :max',
            'category-group.*.nama_sosmed.min' => 'nama sosmed minimal :min',
            'category-group.*.logo.required' => 'foto logo harus di isi',
            'category-group.*.logo.image' => 'foto logo harus berupa foto',
            'category-group.*.logo.mimes' => 'foto logo harus berupa :mimes',
            'category-group.*.link.required' => 'link harus di isi',
            'category-group.*.link.max' => 'link panjang maksimal :max',
            'category-group.*.link.min' => 'link panjang minimal :min',
        ];
    }
}
