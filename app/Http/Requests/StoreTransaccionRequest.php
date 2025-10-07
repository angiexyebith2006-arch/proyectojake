<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransaccionRequest extends FormRequest
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
        'fecha' => ['required', 'date'],
        'detalle' => ['required', 'string', 'max:255'],
        'tipo' => ['required', 'in:Debito,Credito'], // según tus valores
        'valor' => ['required', 'numeric', 'min:0'],
        'metodo_pago' => ['required', 'string', 'max:100'],
        'comite' => ['nullable', 'string', 'max:100'],
        'codigo_usuario' => ['required', 'exists:usuario,id_numero_documento'],
        ];
    }
    public function messages()
{
    return [
        'fecha.required' => 'La fecha es obligatoria.',
        'fecha.date' => 'La fecha debe tener un formato válido.',

        'detalle.required' => 'El detalle de la transacción es obligatorio.',
        'detalle.string' => 'El detalle debe ser un texto.',
        'detalle.max' => 'El detalle no puede tener más de 255 caracteres.',

        'tipo.required' => 'El tipo de transacción es obligatorio.',
        'tipo.in' => 'El tipo de transacción debe ser Debito o Credito.',

        'valor.required' => 'El valor es obligatorio.',
        'valor.numeric' => 'El valor debe ser un número.',
        'valor.min' => 'El valor no puede ser negativo.',

        'metodo_pago.required' => 'El método de pago es obligatorio.',
        'metodo_pago.string' => 'El método de pago debe ser un texto.',
        'metodo_pago.max' => 'El método de pago no puede tener más de 100 caracteres.',

        'comite.string' => 'El nombre del comité debe ser un texto.',
        'comite.max' => 'El nombre del comité no puede tener más de 100 caracteres.',

        'codigo_usuario.required' => 'El código de usuario es obligatorio.',
        'codigo_usuario.exists' => 'El código de usuario no existe en la base de datos.',
    ];
}

}
