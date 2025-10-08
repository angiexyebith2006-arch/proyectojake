<?php



namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCumpleanoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date',
            'codigo_usuario' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fecha_nacimiento.date' => 'La fecha debe tener un formato válido.',
            'codigo_usuario.required' => 'El código de usuario es obligatorio.',
            'codigo_usuario.integer' => 'El código de usuario debe ser un número.',
        ];
    }
}
