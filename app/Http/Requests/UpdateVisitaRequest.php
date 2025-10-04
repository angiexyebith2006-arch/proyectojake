<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateVisitaRequest extends FormRequest
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
            //  ELIMINADO: 'id_visita' - porque es auto-increment
            'motivo' => 'required|string|max:255',
            'fecha' => 'required|date',
            'responsable' => 'required|string|max:255',
            'hora' => 'required|date_format:H:i',  
            'tipo' => 'required|string|max:255',
        ];
    }

     
    public function messages()
{
    return [
            
            'motivo.required' =>'El motivo es obligatorio.',
            'fecha.required' =>'La fecha de la visita es obligatoria.',
            'responsable.required' =>'El nombre del responsable es obligatorio.',
            'hora.required' =>'Diligencia la hora.',
            'tipo.required' =>'Diligencia si es visitante o visitado.',
            
        ];
    }
}
