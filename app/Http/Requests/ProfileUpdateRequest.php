<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'     => ['required', 'string', 'max:255', 'regex:/^[\pL\s]+$/u'],
            'last_name'=> ['nullable', 'string', 'max:255', 'regex:/^[\pL\s]+$/u'],
            'phone'    => ['nullable', 'string', 'digits_between:7,15'],
            'email'    => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'      => 'El nombre es obligatorio.',
            'name.regex'         => 'El nombre solo puede contener letras y espacios.',
            'last_name.regex'    => 'El apellido solo puede contener letras y espacios.',
            'phone.digits_between' => 'El teléfono debe tener entre 7 y 15 dígitos.',
            'email.required'     => 'El correo electrónico es obligatorio.',
            'email.email'        => 'Ingrese un correo electrónico válido.',
            'email.unique'       => 'Este correo ya está registrado.',
        ];
    }
}
