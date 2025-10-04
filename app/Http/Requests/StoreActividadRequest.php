<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreActividadRequest extends FormRequest
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
            'motivo' => 'required|string|max:200',
            'lugar' => 'required|string|max:200',
            'responsable' => 'required|string|max:100',
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required|date_format:H:i',
            'mensaje' => 'nullable|string|max:255'
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'motivo.required' => 'El motivo es obligatorio.',
            'motivo.max' => 'El motivo no puede tener más de 200 caracteres.',
            'lugar.required' => 'El lugar es obligatorio.',
            'lugar.max' => 'El lugar no puede tener más de 200 caracteres.',
            'responsable.required' => 'El responsable es obligatorio.',
            'responsable.max' => 'El responsable no puede tener más de 100 caracteres.',
            'fecha.required' => 'La fecha es obligatoria.',
            'fecha.date' => 'La fecha debe ser una fecha válida.',
            'fecha.after_or_equal' => 'La fecha debe ser igual o posterior a hoy.',
            'hora.required' => 'La hora es obligatoria.',
            'hora.date_format' => 'La hora debe tener un formato válido (HH:MM).',
            'mensaje.max' => 'El mensaje no puede tener más de 255 caracteres.'
        ];
    }
}