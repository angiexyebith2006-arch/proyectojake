<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVisitaRequest extends FormRequest
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
          'motivo' => ['required', 'string'],
          'fecha' => ['required', 'date'],
          'responsable' => ['required', 'string'],
          'hora' => ['required', 'date_format:H:i'],
          'tipo' => ['required','string'],
          'codigo_usuario' => ['required', 'exists:usuario,id_numero_documento'],
        ];
    }
}
