<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class MatriculaFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules() {
        return [
            'id_curso' => 'required',
            'id_aluno' => 'required'
        ];
    }

    // MÉTODO OPCIONAL
    public function messages() {
        return [
            'id_curso.required' => 'Selecione o curso!',
            'id_aluno.required' => 'Selecione o aluno!'
        ];
    }
}
