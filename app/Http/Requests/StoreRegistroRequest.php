<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegistroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Cambiado a true para permitir la validación
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id_numero_documento' =>    'required|integer|unique:usuarios,id_numero_documento',
            'nombre' =>                 'required|string|max:25',
            'apellido' =>               'required|string|max:25',
            'tipo_documento' =>         'required|string|in:C.C.,T.I.',
            'correo_electronico' =>     'required|email|unique:usuarios,correo_electronico',
            'fecha_nacimiento' =>       'required|date',
            'bautizo' =>                'required|in:si,no',
            'bautizado_espiritu' =>     'required|in:si,no',
            'telefono'  =>              'required|digits:10',
            'genero' =>                 'required|in:Masculino,Femenino',
            'contrasena' =>             'required|string|min:8|max:255|confirmed',
            'rol_id'   =>               'required|exists:roles,id',
            'cargo_id' =>               'required|exists:cargos,id',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            // Mensajes para id_numero_documento
            'id_numero_documento.required' => 'El número de documento es obligatorio.',
            'id_numero_documento.integer' => 'El número de documento debe ser un valor numérico.',
            'id_numero_documento.unique' => 'Este número de documento ya está registrado.',
            
            // Mensajes para nombre
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no puede tener más de 25 caracteres.',
            
            // Mensajes para apellido
            'apellido.required' => 'El apellido es obligatorio.',
            'apellido.string' => 'El apellido debe ser texto.',
            'apellido.max' => 'El apellido no puede tener más de 25 caracteres.',
            
            // Mensajes para tipo_documento
            'tipo_documento.required' => 'Seleccione un tipo de documento.',
            'tipo_documento.string' => 'El tipo de documento debe ser texto.',
            'tipo_documento.in' => 'El tipo de documento seleccionado no es válido.',
            
            // Mensajes para correo_electronico
            'correo_electronico.required' => 'El correo electrónico es obligatorio.',
            'correo_electronico.email' => 'Ingrese un correo válido.',
            'correo_electronico.unique' => 'Este correo ya está registrado.',
            
            // Mensajes para fecha_nacimiento
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fecha_nacimiento.date' => 'La fecha de nacimiento debe ser una fecha válida.',
            
            // Mensajes para bautizo
            'bautizo.required' => 'Indique si está bautizado.',
            'bautizo.in' => 'El valor para bautizo no es válido.',
            
            // Mensajes para bautizado_espiritu
            'bautizado_espiritu.required' => 'Indique si está bautizado con el Espíritu Santo.',
            'bautizado_espiritu.in' => 'El valor para bautizado con el Espíritu Santo no es válido.',
            
            // Mensajes para telefono
            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.digits' => 'El teléfono debe tener exactamente 10 dígitos.',
            
            // Mensajes para genero
            'genero.required' => 'Seleccione un género.',
            'genero.in' => 'El género seleccionado no es válido.',
            
            // Mensajes para contrasena
            'contrasena.required' => 'La contraseña es obligatoria.',
            'contrasena.string' => 'La contraseña debe ser texto.',
            'contrasena.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'contrasena.max' => 'La contraseña no puede tener más de 255 caracteres.',
            'contrasena.confirmed' => 'Las contraseñas no coinciden.',
            
            // Mensajes para rol_id
            'rol_id.required' => 'El rol es obligatorio.',
            'rol_id.exists' => 'El rol seleccionado no es válido.',
            
            // Mensajes para cargo_id
            'cargo_id.required' => 'El cargo es obligatorio.',
            'cargo_id.exists' => 'El cargo seleccionado no es válido.',
        ];
    }
}