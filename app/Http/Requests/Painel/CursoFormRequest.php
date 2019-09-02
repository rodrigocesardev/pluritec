<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class CursoFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules() {
        return [
            'titulo' => 'required|min:4|max:150'
        ];
    }

    // MÉTODO OPCIONAL
    public function messages() {
        return [
            'name.required' => 'Informe o título do curso!',
            'name.min' => 'Preencha o campo título com no mínimo 4 caracteres!'
        ];
    }
}
