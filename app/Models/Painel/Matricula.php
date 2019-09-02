<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $fillabel = ['id_curso', 'id_aluno'];
    
    protected $guarded = ['admin'];
    
    protected $table = 'matriculas';
}
