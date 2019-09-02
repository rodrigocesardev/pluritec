@extends('painel.templates.template')

@section('content')

<br>
<a href="{{route('alunos.index')}}" class="btn btn-default"><span class="glyphicon glyphicon-user"></span> Aluno</a>
<a href="{{route('matriculas.index')}}" class="btn btn-default"><span class="glyphicon glyphicon-education"></span> Matrícula</a>

<h1 class="title-pg"><span class="glyphicon glyphicon-book"></span> Listagem dos Cursos</h1>

<a href="{{route('cursos.create')}}" class="btn btn-primary btn-add"><span class="glyphicon glyphicon-plus"></span> Cadastrar</a>

<table class="table table-striped">
    <tr>
        <th>Título</th>
        <th>Descrição</th>
        <th width="200px">Ações</th>
    </tr>

    @foreach($cursos as $curso)
    <tr>
        <td>{{$curso->titulo}}</td>
        <td>{{$curso->descricao}}</td>
        
        <td>
            <a href="{{route('cursos.edit', $curso->id)}}" class="actions edit">
                <span class="glyphicon glyphicon-pencil"></span> Editar
            </a>
            <a href="{{route('cursos.show', $curso->id)}}" class="actions delete">
                <span class="glyphicon glyphicon-eye-open"></span> Visualizar
            </a>
        </td>
    </tr>
    @endforeach
</table>

{{$cursos->links()}}

@endsection