<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEquipoRequest extends FormRequest
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
            'tipo_equipo' => 'required|string|max:255',
            'marca_equipo' => 'required|string|max:255',
            'modelo_equipo' => 'required|string|max:255',
            'fecha_recepcion' => 'required|date',
            'fecha_entrega' => 'nullable|date',
            'fecha_retiro' => 'nullable|date',
            'equipo_retirado' => 'boolean',
            'id_cliente' => 'required|exists:cliente,id',
            'multa' => 'nullable|numeric|min:0|max:999999.99',
            'monto_pagar' => 'nullable|numeric|min:0|max:999999.99',
        ];
    }
}
