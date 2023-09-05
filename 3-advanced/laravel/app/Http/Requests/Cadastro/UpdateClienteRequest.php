<?php

namespace App\Http\Requests\Cadastro;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateClienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'min:3', 'max:255'],
            'telefone' => ['required', 'regex:/\+(\d{1,2})[\s\(](\d+)[\s\)](\d{4,5}-\d{4})/'],
            'email' => ['required', 'email:rfc'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
