<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrestadorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'cpfCnpj' => ['required', 'max:18', 'min:11'],
            'email' => ['required', 'email'],
            'telefone.ddd' => ['required', 'max:4', 'min:2'],
            'telefone.numero' => ['required', 'max:10', 'min:8'],
            'razaoSocial' => ['required'],
            'simplesNacional' => ['required'],
            'endereco.tipoLogradouro' => ['required'],
            'endereco.logradouro' => ['required'],
            'endereco.numero' => ['required'],
            'endereco.tipoBairro' => ['required'],
            'endereco.bairro' => ['required'],
            'endereco.codigoCidade' => ['required', 'max:7', 'min:7'],
            'endereco.estado' => ['required'],
            'endereco.cep' => ['required', 'max:9', 'min:9'],
        ];

        return $rules;
        
    }

    public function messages() {   
        return [     
            'required' => 'O campo :attribute é obrigatório',
            'email' => 'O :email informado não é um endereço de e-mail válido',
            'max' => 'O valor informado deve ter no máximo :max caracteres',
            'min' => 'O valor informado deve ter no mínimo :min caracteres',
        ]; 
    }
}
