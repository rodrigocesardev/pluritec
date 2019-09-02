<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class AlunoFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules() {
        return [
            'nome' => 'required|min:3|max:150',
            'email' => 'required|min:9|max:60|email',
            'nascimento' => 'required|date'
        ];
    }

    // MÉTODO OPCIONAL
    public function messages() {
        return [
            'name.required' => 'Informe o nome do Aluno!',
            'name.min' => 'Preencha o campo nome com no mínimo 3 caracteres!',
            'nascimento.date' => 'Informe uma data válida'
        ];
    }
}
