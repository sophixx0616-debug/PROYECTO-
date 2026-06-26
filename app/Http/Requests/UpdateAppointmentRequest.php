<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAppointmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'service_id' => 'required|exists:services,id',
            'date'       => 'required|date',
            'time'       => 'required|date_format:H:i',
            'worker'     => 'required|string|max:255',
            'status'     => 'nullable|in:pendiente,confirmada,cancelada',
        ];
    }

    public function messages(): array
    {
        return [
            'service_id.required' => 'Debe seleccionar un servicio.',
            'service_id.exists'   => 'El servicio seleccionado no existe.',
            'date.required'       => 'La fecha es obligatoria.',
            'date.date'           => 'Ingrese una fecha válida.',
            'time.required'       => 'La hora es obligatoria.',
            'time.date_format'    => 'El formato de hora no es válido.',
            'worker.required'     => 'Debe seleccionar un especialista.',
            'status.in'           => 'El estado seleccionado no es válido.',
        ];
    }
}
