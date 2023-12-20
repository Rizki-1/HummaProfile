<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
            'old_pass' => "required",
            'new_pass' => "required|min:8",
            'confirmation_pass' => "required|same:new_pass"
        ];
    }

    public function messages(): array
    {
        return [
            'old_pass.required' => 'Kata sandi lama wajib diisi.',
            'new_pass.required' => 'Kata sandi baru wajib diisi.',
            'new_pass.min' => 'Panjang kata sandi baru minimal :min karakter.',
            'confirmation_pass.required' => 'Konfirmasi kata sandi wajib diisi.',
            'confirmation_pass.same' => 'Konfirmasi kata sandi harus sama dengan kata sandi baru.',
        ];
    }

}
