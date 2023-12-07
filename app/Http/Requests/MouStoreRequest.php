<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MouStoreRequest extends FormRequest
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
            'foto_mou' => 'required|file|image|max:50000',
            'nama_mou' => 'required|unique:mous,nama_mou'
        ];
    }

    public function messages(): array
    {
        return [
            'foto_mou.required' => 'foto mou harus di isi',
            'foto_mou.image' => 'foto mou harus valid',
            'foto_mou.file' => 'foto mou harus valid',
            'nama_mou.required' => 'nama mou harus di isi',
            'nama_mou.unique' => 'nama mou sudah ada',
        ];
    }
}
