<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdRequest extends FormRequest
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
        return [
            'name'=>'required',
            'description'=>'required',
            'body'=>'required',
            'price'=>'required',
            'photos.*'=>'image'

        ];
    }

    public function messages()
    {
        return[
            'required'=>'O :attribute é obrigatório',
            'min'=>'O :attribute deve ter no mínimo :min caracteres',
            'image'=>'O arquivo não é uma imagem válida :(!'

        ];
    }
}
