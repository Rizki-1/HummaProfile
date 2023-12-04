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
            'message' => 'required|max:100|min:10'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'nama harus di isi',
            'name.string' => 'nama harus valid',
            'name.min' => 'nama minimal :min',
            'name.max' => 'nama maksimal :max',
            'email.required' => 'email harud di isi',
            'email.email' => 'email harud valid',
            'message.required' => 'pesan harus di isi',
            'message.max' => 'pesan maksimal :max',
            'message.min' => 'pesan minimal :min',
        ];
    }
}
