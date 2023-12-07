<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MouUpdateRequest extends FormRequest
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
        $id = $this->route('mou');
        return [
            'foto_mou' => 'nullable|file|image|max:50000',
            'nama_mou' => 'required|unique:mous,nama_mou,'. $id .',id'
        ];
    }
}
