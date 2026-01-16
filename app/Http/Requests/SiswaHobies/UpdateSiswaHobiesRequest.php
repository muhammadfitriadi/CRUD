<?php

namespace App\Http\Requests\SiswaHobbies;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSiswaHobiesRequest extends FormRequest
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
            'siswa_ids' => 'required|array',
            'siswa_ids.*' => 'integer|exists:siswas,id',
            'hobbies_ids' => 'required|array',
            'hobbies_ids.*' => 'integer|exists:hobbies,id',
        ];
    }
}
