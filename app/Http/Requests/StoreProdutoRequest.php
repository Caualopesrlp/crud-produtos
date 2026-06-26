<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProdutoRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255|unique:produtos,nome',
            'preco' => 'required|numeric|min:0.01',
            'descricao' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O nome do produto é obrigatório.',
            'nome.max' => 'O nome não pode ter mais que 255 caracteres.',

            'preco.required' => 'Informe o preço do produto.',
            'preco.numeric' => 'O preço deve ser um valor numérico.',
            'preco.min' => 'O preço deve ser maior que zero.',

            'descricao.string' => 'A descrição deve ser um texto válido.',
        ];
    }
}
