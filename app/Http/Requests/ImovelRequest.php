<?php

namespace App\Http\Requests;

class ImovelRequest extends Request
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
            'valor_aluguel' => 'required',
            'endereco'      => 'required',
            'cidade'        => 'required',
            'estado'        => 'required',
            'descricao'     => 'required',
            'imagem'        => 'required|mimes:jpeg,bmp,png',
        ];

        if(is_null(Request::get('id'))) {
            $rules['imagem'] = 'required|mimes:jpeg,bmp,png';
        }else{
            $rules['imagem'] = 'mimes:jpeg,bmp,png';
        }

        return $rules;
    }

    public function messages()
    {
        $messages = [
            'valor_aluguel.required' => 'O campo <b>VALOR</b> é obrigatório',
            'endereco.required' => 'O campo <b>ENDEREÇO</b> é obrigatório',
            'cidade.required' => 'O campo <b>CIDADE</b> é obrigatório',
            'estado.required' => 'O campo <b>ESTADO</b> é obrigatório',
            'descricao.required' => 'O campo <b>DESCRICAO</b> é obrigatório',
            'imagem.required' => 'O campo <b>IMAGEM</b> é obrigatório',
            'imagem.mimes' => 'Você só pode adicionar imagens nos seguintes formatos: .jpg, .png, .bmp',
        ];

        return $messages;
    }
}
