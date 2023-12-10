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
            'no_telp' => 'required',
            'alamat' => 'required',
            'tentang' => 'required',
            'poto_profile' => 'image|mimes:png',
            'sosmed-group.*.name' => 'required',
            'sosmed-group.*.link' => 'required|url',
        ];
    }
}
