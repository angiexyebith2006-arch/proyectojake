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
}
