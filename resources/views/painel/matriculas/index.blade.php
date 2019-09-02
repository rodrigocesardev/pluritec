@extends('painel.templates.template')

@section('content')

<br>
<a href="{{route('alunos.index')}}" class="btn btn-default"><span class="glyphicon glyphicon-user"></span> Aluno</a>
<a href="{{route('cursos.index')}}" class="btn btn-default"><span class="glyphicon glyphicon-book"></span> Curso</a>

<h1 class="title-pg"><span class="glyphicon glyphicon-education"></span> Listagem das Matrículas</h1>

<a href="{{route('matriculas.create')}}" class="btn btn-primary btn-add"><span class="glyphicon glyphicon-plus"></span> Cadastrar</a>

<table class="table table-striped">
    <tr>
        <th>Curso</th>
        <th>Aluno</th>
        <th width="200px">Ações</th>
    </tr>

    @foreach($matriculas as $matricula)
    <tr>
        <td>{{$matricula->titulo}}</td>
        <td>{{$matricula->nome}}</td>
        
        <td>
            <a href="{{route('matriculas.edit', $matricula->id)}}" class="actions edit">
                <span class="glyphicon glyphicon-pencil"></span> Editar
            </a>
            <a href="{{route('matriculas.show', $matricula->id)}}" class="actions delete">
                <span class="glyphicon glyphicon-eye-open"></span> Visualizar
            </a>
        </td>
    </tr>
    @endforeach
</table>

{{$matriculas->links()}}

@endsection