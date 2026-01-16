<?php

namespace App\Http\Requests\SiswaHobies;

use Illuminate\Foundation\Http\FormRequest;

class StoreSiswaHobiesRequest extends FormRequest
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
            'siswa_id' => 'required|exists:siswas,id',
            'hobbies_ids' => 'required|array',
            'hobbies_ids.*' => 'exists:hobbies,id',
        ];
    }
}
