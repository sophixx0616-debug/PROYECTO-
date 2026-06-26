<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'        => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price'       => 'required|numeric|min:0',
            'duration'    => 'required|integer|min:1|max:480',
            'status'      => 'nullable|in:0,1',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'        => 'El nombre del servicio es obligatorio.',
            'description.required' => 'La descripción es obligatoria.',
            'price.required'       => 'El precio es obligatorio.',
            'price.numeric'        => 'El precio debe ser un valor numérico.',
            'price.min'            => 'El precio no puede ser negativo.',
            'duration.required'    => 'La duración es obligatoria.',
            'duration.integer'     => 'La duración debe ser un número entero.',
            'duration.min'         => 'La duración debe ser al menos 1 minuto.',
            'duration.max'         => 'La duración no puede superar 480 minutos.',
            'status.in'            => 'El estado seleccionado no es válido.',
        ];
    }
}
