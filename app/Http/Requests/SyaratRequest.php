<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SyaratRequest extends FormRequest
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
            'target_layanan_id' => 'required|exists:target_layanans,id',
            'syarat-group.*.syarat' => 'required|min:5|max:100'
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
