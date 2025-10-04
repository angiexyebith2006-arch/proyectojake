<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTransaccionRequest extends FormRequest
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
        'fecha' => 'required|date',
        'detalle' => 'required|string|max:255',
        'tipo' => 'required|string',
        'valor' => 'required|numeric',
        'metodo_pago' => 'required|string',
        'comite' => 'nullable|string|max:255',
        'codigo_usuario' => 'required|exists:usuario,id_numero_documento'
        ];
    }
}
