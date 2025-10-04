<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUsuarioRequest extends FormRequest
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
     */
    public function rules(): array
    {
        $userId = $this->route('usuario')->id_numero_documento;
        
        return [
            'id_numero_documento' => [
                'required',
                'integer',
                Rule::unique('usuario', 'id_numero_documento')->ignore($userId, 'id_numero_documento')
            ],
            'nombre' => 'required|string|max:25',
            'apellido' => 'required|string|max:25',
            'tipo_documento' => 'required|string|in:C.C.,T.I.',
            'correo_electronico' => [
                'required',
                'email',
                Rule::unique('usuario', 'correo_electronico')->ignore($userId, 'id_numero_documento')
            ],
            'fecha_nacimiento' => 'required|date',
            'bautizo' => 'required|in:Sí,No',
            'bautizado_espiritu' => 'required|in:Sí,No',
            'telefono' => 'required|digits:10',
            'genero' => 'required|in:Masculino,Femenino',
            'contrasena' => 'nullable|string|min:8|max:255|confirmed',
            'rol' => 'required|exists:rol,id_rol',
            'cargo' => 'required|exists:cargo,id_cargo',
        ];
    }

    public function messages(): array
    {
        return [
            'id_numero_documento.required' => 'El número de documento es obligatorio.',
            'id_numero_documento.unique' => 'Este número de documento ya está registrado.',
            'nombre.required' => 'El nombre es obligatorio',
            'apellido.required' => 'El apellido es obligatorio',
            'tipo_documento.required' => 'El tipo de documento es obligatorio',
            'correo_electronico.required' => 'El correo electrónico es obligatorio',
            'correo_electronico.email' => 'El correo electrónico debe ser válido',
            'correo_electronico.unique' => 'Este correo electrónico ya está registrado',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria',
            'bautizo.required' => 'El campo bautizo es obligatorio',
            'bautizado_espiritu.required' => 'El campo bautizado en espíritu es obligatorio',
            'telefono.required' => 'El teléfono es obligatorio',
            'telefono.digits' => 'El teléfono debe tener exactamente 10 dígitos',
            'genero.required' => 'El género es obligatorio',
            'contrasena.min' => 'La contraseña debe tener al menos 8 caracteres',
            'contrasena.confirmed' => 'Las contraseñas no coinciden',
            'rol.required' => 'El rol es obligatorio',
            'cargo.required' => 'El cargo es obligatorio',
        ];
    }
}