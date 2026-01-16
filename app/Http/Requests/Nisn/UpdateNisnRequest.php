<?php

namespace App\Http\Requests\Nisn;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNisnRequest extends FormRequest
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
            'nisn' => 'required|max:255|unique:nisn',
            'siswa_id' => 'required|exists:siswa,id'
        ];
    }
}
