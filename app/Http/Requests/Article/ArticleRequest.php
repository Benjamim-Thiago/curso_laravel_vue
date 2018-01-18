<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return[
            'title.required'=>'O campo Título é Obrigatório.',
            'title.max'=>'É permitido somente 100 caracteres.',
            'title.min'=>'Título deve conter pelo menos 2 dígitos.',

            'description.required'=>'O campo Descrição é Obrigatório.',
            'description.max'=>'É permitido somente 255 caracteres.',
            'description.min'=>'Descrição deve conter pelo menos 2 dígitos.',

            'content.required'=>'O campo Teor é Obrigatório.',
            'content.min'=>'Teor deve conter pelo menos 2 dígitos.',
            
            'date.required'=>'O campo Data é Obrigatório.'
        ];
    }

    public function rules()
    {
        return [
            'title'=>'required|min:2|max:100',
            'description'=>'required|min:2|max:255',
            'content'=>'required|min:2',
            'date'=>'required'
        ];
    }
}