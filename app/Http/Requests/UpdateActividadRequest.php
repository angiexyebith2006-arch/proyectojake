<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateActividadRequest extends FormRequest
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
            'motivo' => [
                'required',
                'string',
                'max:200',
                'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s\.,;:¿?¡!()\-"]+$/'
            ],
            'lugar' => [
                'required', 
                'string',
                'max:200',
                'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s\.,;:¿?¡!()\-"]+$/'
            ],
            'responsable' => [
                'required',
                'string', 
                'max:100',
                'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s\.\-]+$/'
            ],
            'fecha' => 'required|date',
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
            'motivo.required'       => 'El motivo es obligatorio.',
            'motivo.string'         => 'El motivo debe ser texto.',
            'motivo.max'            => 'El motivo no puede tener más de 200 caracteres.',
            'motivo.regex'          => 'El motivo solo puede contener letras, espacios y signos de puntuación.',
            
            'lugar.required'        => 'El lugar es obligatorio.',
            'lugar.string'          => 'El lugar debe ser texto.',
            'lugar.max'             => 'El lugar no puede tener más de 200 caracteres.',
            'lugar.regex'           => 'El lugar solo puede contener letras, espacios y signos de puntuación.',
            
            'responsable.required'  => 'El responsable es obligatorio.',
            'responsable.string'    => 'El responsable debe ser texto.',
            'responsable.max'       => 'El responsable no puede tener más de 100 caracteres.',
            'responsable.regex'     => 'El responsable solo puede contener letras y espacios.',
            
            'fecha.required'        => 'La fecha es obligatoria.',
            'fecha.date'            => 'La fecha debe ser una fecha válida.',
            
            'hora.required'         => 'La hora es obligatoria.',
            'hora.date_format'      => 'La hora debe tener un formato válido (HH:MM).',
            
            'mensaje.string'        => 'El mensaje debe ser texto.',
            'mensaje.max'           => 'El mensaje no puede tener más de 255 caracteres.'
        ];
    }

    /**
     * Manejar una validación fallida.
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            redirect()->back()
                ->withErrors($validator)
                ->withInput()
        );
    }
}