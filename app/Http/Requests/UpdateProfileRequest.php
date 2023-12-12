<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'email' => 'required|email',
            'no_telp' => 'required|regex:/^08[0-9]{9,12}$/',
            'alamat' => 'required',
            'tentang' => 'required',
            'poto_profile' => 'image|mimes:png',
            'sosmed-group' => 'required|array',
            'sosmed-group.*.name' => 'required',
            'sosmed-group.*.link' => 'required|url',
        ];
    }

    public function messages()
    {
        return [
            'no_telp.required' => 'Nomor telepon harus diisi.',
            'no_telp.regex' => 'Format nomor telepon tidak valid.',
            'sosmed-group.*.name.required' => 'Nama sosmed harus diisi.',
            'sosmed-group.*.link.required' => 'Link sosmed harus diisi.',
            'sosmed-group.*.link.url' => 'Format link sosmed tidak valid.',
        ];
    }
}
