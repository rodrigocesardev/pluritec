@extends('painel.templates.template')

@section('content')

<h1 class="title-pg">
    <a href="{{route('matriculas.index')}}"><span class="glyphicon glyphicon-fast-backward"></span></a>
    {{$title}}
</h1>

<p><b>Aluno: </b>{{$curso[0]->titulo}}</p>
<p><b>Curso: </b>{{($aluno[0]->nome)}}</p>

@if( isset($errors) && count($errors) > 0 )
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
</div>
@endif

<form class="form" method="post" action="{{route('matriculas.destroy', $matricula->id)}}">
    {{ csrf_field() }}
    {!! method_field('DELETE') !!}
    <button class="btn btn-danger">
        <span class="glyphicon glyphicon-trash"></span> Excluir Matrícula
    </button>
</form>

@endsection