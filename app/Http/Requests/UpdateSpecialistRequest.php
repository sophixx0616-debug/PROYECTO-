<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSpecialistRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'     => 'required|string|max:255|regex:/^[\pL\s]+$/u',
            'specialty'=> 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'   => 'El nombre del especialista es obligatorio.',
            'name.regex'      => 'El nombre solo puede contener letras y espacios.',
            'specialty.required' => 'La especialidad es obligatoria.',
        ];
    }
}
