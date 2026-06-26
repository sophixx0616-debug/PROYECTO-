<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'     => 'required|string|max:255|regex:/^[\pL\s]+$/u',
            'last_name'=> 'required|string|max:255|regex:/^[\pL\s]+$/u',
            'phone'    => 'required|string|digits_between:7,15',
            'email'    => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role_id'  => 'required|exists:roles,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'      => 'El nombre es obligatorio.',
            'name.regex'         => 'El nombre solo puede contener letras y espacios.',
            'last_name.required' => 'El apellido es obligatorio.',
            'last_name.regex'    => 'El apellido solo puede contener letras y espacios.',
            'phone.required'     => 'El teléfono es obligatorio.',
            'phone.digits_between' => 'El teléfono debe tener entre 7 y 15 dígitos.',
            'email.required'     => 'El correo electrónico es obligatorio.',
            'email.email'        => 'Ingrese un correo electrónico válido.',
            'email.unique'       => 'Este correo ya está registrado.',
            'password.required'  => 'La contraseña es obligatoria.',
            'password.min'       => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'role_id.required'   => 'El rol es obligatorio.',
            'role_id.exists'     => 'El rol seleccionado no existe.',
        ];
    }
}
