<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCumpleanoRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado a realizar esta solicitud.
     */
    public function authorize(): bool
    {
        return true; // Permitir la validación
    }

    /**
     * Reglas de validación para los campos del formulario.
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'codigo_usuario' => 'required|integer|min:1',
        ];
    }

    /**
     * Mensajes personalizados para cada regla.
     */
    public function messages(): array
    {
        return [
            // NOMBRE
            'nombre.required' => 'El campo Nombre es obligatorio.',
            'nombre.string' => 'El nombre debe contener solo texto.',
            'nombre.max' => 'El nombre no puede tener más de 255 caracteres.',

            // FECHA DE NACIMIENTO
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fecha_nacimiento.date' => 'La fecha de nacimiento debe tener un formato válido (AAAA-MM-DD).',

            // CÓDIGO DE USUARIO
            'codigo_usuario.required' => 'El código de usuario es obligatorio.',
            'codigo_usuario.integer' => 'El código de usuario debe ser un número entero.',
            'codigo_usuario.min' => 'El código de usuario debe ser mayor que 0.',
        ];
    }
}

