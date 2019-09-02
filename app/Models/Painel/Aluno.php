<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillabel = ['nome', 'email', 'sexo', 'nascimento'];
    
    protected $guarded = ['admin'];
    
    protected $table = 'alunos';
}
