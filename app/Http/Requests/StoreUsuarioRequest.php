<?php

namespace App\Http\Requests;
 
use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
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
        'id_numero_documento' =>    'required|integer|unique:usuario,id_numero_documento',
        'nombre' =>                 'required|string|max:25',
        'apellido' =>               'required|string|max:25',
        'tipo_documento' =>         'required|string|in:C.C.,T.I.',
        'correo_electronico' =>     'required|email|unique:usuario,correo_electronico',
        'fecha_nacimiento' =>       'required|date',
        'bautizo' =>                'required|in:si,no',
        'bautizado_espiritu' =>     'required|in:si,no',
        'telefono'  =>              'required|digits:10',
        'genero' =>                 'required|in:Masculino,Femenino',
        'contrasena' =>             'required|string|min:8|max:255|confirmed',
        'rol'   =>                  'required|exists:rol,id_rol',
        'cargo' =>                  'required|exists:cargo,id_cargo',
        ];
    }
    
    public function messages()
{
    return [
    'id_numero_documento.required' =>'El número de documento es obligatorio.',
    'nombre.required' => 'El nombre es obligatorio.',
    'apellido.required' => 'El apellido obligatorio.',
    'tipo_documento.required' => 'Seleccione un tipo de documento.',
    'correo_electronico.required' => 'El correo electrónico es obligatorio.',
    'correo_electronico.email' => 'Ingrese un correo válido',
    'correo_electronico.unique' => 'Este correo ya está registrado',
    'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
    'bautizo.required' => 'Indique si está bautizado.',
    'bautizado_espiritu.required' => 'Indique si está bautizado con el Espíritu Santo',
    'telefono.required' => 'El teléfono es obligatorio.',
    'genero.required' =>  'Seleccione un género',
    'contrasena.required' => 'La contraseña es obligatoria',
    'contrasena.min' => 'La contraseña debe tener al menos 8 caracteres.',
     'contrasena.confirmed' => 'Las contraseñas no coinciden.',
    ];
}
}

