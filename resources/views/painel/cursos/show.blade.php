@extends('painel.templates.template')

@section('content')

<h1 class="title-pg">
    <a href="{{route('cursos.index')}}"><span class="glyphicon glyphicon-fast-backward"></span></a>
    {{$title}}
</h1>

<p><b>Título: </b>{{$curso->titulo}}</p>
<p><b>Descrição: </b>{{($curso->descricao)}}</p>

@if( isset($errors) && count($errors) > 0 )
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{$error}}</p>
    @endforeach
</div>
@endif

<form class="form" method="post" action="{{route('cursos.destroy', $curso->id)}}">
    {{ csrf_field() }}
    {!! method_field('DELETE') !!}
    <button class="btn btn-danger">
        <span class="glyphicon glyphicon-trash"></span> Deletar Curso
    </button>
</form>

@endsection