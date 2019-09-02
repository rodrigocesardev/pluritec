@extends('painel.templates.template')

@section('content')

<h1 class="title-pg">{{$title}}</h1>

@if( isset($errors) && count($errors) > 0 )
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
</div>
@endif

@if(isset($matricula))
    <form class="form" method="post" action="{{route('matriculas.update', $matricula->id)}}">
        {!! method_field('PUT') !!}
@else
    <form class="form" method="post" action="{{route('matriculas.store')}}">
@endif

    {!! csrf_field() !!}
    <div class="form-group">
        <select name="id_curso" class="form-control">
            <option value="">Escolha o curso</option>
            @foreach($cursos as $curso)
            <option value="{{$curso->id}}"
                    @if(isset($matricula) && $matricula->id_curso == $curso->id)
                        selected
                    @endif>{{$curso->titulo}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <select name="id_aluno" class="form-control">
            <option value="">Escolha o Aluno</option>
            @foreach($alunos as $aluno)
            <option value="{{$aluno->id}}"
                    @if(isset($matricula) && $matricula->id_aluno == $aluno->id)
                        selected
                    @endif>{{$aluno->nome}}</option>
            @endforeach
        </select>
    </div>
    
    @if(isset($matricula))
        <button class="btn btn-primary">Atualizar</button>
    @else
        <button class="btn btn-primary">Cadastrar</button>
    @endif
    
    <a href="{{route('matriculas.index')}}" class="btn btn-light">
        <span class="glyphicon glyphicon-chevron-left"></span> Voltar
    </a>
</form>
@endsection