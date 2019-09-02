<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillabel = ['titulo', 'descricao'];
    
    protected $guarded = ['admin'];
    
    protected $table = 'cursos';

}
