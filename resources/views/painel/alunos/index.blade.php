@extends('painel.templates.template')

@section('content')

<br>
<a href="{{route('cursos.index')}}" class="btn btn-default"><span class="glyphicon glyphicon-book"></span> Curso</a>
<a href="{{route('matriculas.index')}}" class="btn btn-default"><span class="glyphicon glyphicon-education"></span> Matrícula</a>

<h1 class="title-pg"><span class="glyphicon glyphicon-user"></span> Listagem dos Alunos</h1>

<table style="width: 100%;">
    
        <tr>
            <td style="width: 11%;"><a href="{{route('alunos.create')}}" class="btn btn-primary btn-add"><span class="glyphicon glyphicon-plus"></span> Cadastrar</a></td>
            <td align="right">
                <form class="form" method="post" action="">
                    {!! csrf_field() !!}
                    <input type="text" name="nome" placeholder="Nome:" class="form-control-serarch" value="{{old('nome')}}">
                    <input type="text" name="email" placeholder="E-mail:" class="form-control-serarch" value="{{old('email')}}">
                    <button class="btn btn-info"><span class="glyphicon glyphicon-search"></span> Pesquisar</button>

                </form>
            </td>
        </tr>
</table>

<table class="table table-striped">
    <tr>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Sexo</th>
        <th>Nascimento</th>
        <th width="200px">Ações</th>
    </tr>

    @foreach($alunos as $aluno)
    <tr>
        <td>{{$aluno->nome}}</td>
        <td>{{$aluno->email}}</td>
        <td>{{($aluno->sexo == "M")? 'Masculino':'Feminino'}}</td>
        <td>{{date( 'd/m/Y' , strtotime($aluno->nascimento))}}</td>
        
        <td>
            <a href="{{route('alunos.edit', $aluno->id)}}" class="actions edit">
                <span class="glyphicon glyphicon-pencil"></span> Editar
            </a>
            <a href="{{route('alunos.show', $aluno->id)}}" class="actions delete">
                <span class="glyphicon glyphicon-eye-open"></span> Visualizar
            </a>
        </td>
    </tr>
    @endforeach
</table>

{{$alunos->links()}}

@endsection