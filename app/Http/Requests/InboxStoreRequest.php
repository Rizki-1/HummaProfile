<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InboxStoreRequest extends FormRequest
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
            'name' => 'required|string|min:10|max:50',
            'email'=> 'required|email:rfc,dns',
            'message' => 'required|max:5000|min:10'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama harus di isi',
            'name.string' => 'Nama harus valid',
            'name.min' => 'Nama minimal :min',
            'name.max' => 'Nama maksimal :max',
            'email.required' => 'Email harus di isi',
            'email.email' => 'Email harud valid',
            'message.required' => 'pesan harus di isi',
            'message.max' => 'pesan maksimal :max',
            'message.min' => 'pesan minimal :min',
        ];
    }
}
