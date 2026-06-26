<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'service_id' => 'required|exists:services,id',
            'date'       => 'required|date|after_or_equal:today',
            'time'       => 'required|date_format:H:i',
            'worker'     => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'service_id.required' => 'Debe seleccionar un servicio.',
            'service_id.exists'   => 'El servicio seleccionado no existe.',
            'date.required'       => 'La fecha es obligatoria.',
            'date.date'           => 'Ingrese una fecha válida.',
            'date.after_or_equal' => 'La fecha no puede ser anterior a hoy.',
            'time.required'       => 'La hora es obligatoria.',
            'time.date_format'    => 'El formato de hora no es válido.',
            'worker.required'     => 'Debe seleccionar un especialista.',
        ];
    }
}
