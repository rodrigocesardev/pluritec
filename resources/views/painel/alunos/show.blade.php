@extends('painel.templates.template')

@section('content')

<h1 class="title-pg">
    <a href="{{route('alunos.index')}}"><span class="glyphicon glyphicon-fast-backward"></span></a>
    {{$title}}
</h1>

<p><b>Nome: </b>{{$aluno->nome}}</p>
<p><b>E-mail: </b>{{($aluno->email)}}</p>
<p><b>Sexo: </b>{{($aluno->sexo == 'M')?'Masculino':'Feminino'}}</p>
<p><b>Nascimento: </b>{{date_format(date_create($aluno->nascimento), "d/m/Y")}}</p>

@if( isset($errors) && count($errors) > 0 )
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
</div>
@endif

<form class="form" method="post" action="{{route('alunos.destroy', $aluno->id)}}">
    {{ csrf_field() }}
    {!! method_field('DELETE') !!}
    <button class="btn btn-danger">
        <span class="glyphicon glyphicon-trash"></span> Deletar Aluno
    </button>
</form>

@endsection