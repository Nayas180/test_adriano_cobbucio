<?php

namespace App\Http\Requests\Estorno;

use Illuminate\Foundation\Http\FormRequest;

class EstornoTransferenciasRequest extends FormRequest
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
            "id_transferencia" => "required|integer|min:1|gt:0",
            "id_solicitacao" => "required|integer|min:1|gt:0",
        ];
    }
}
