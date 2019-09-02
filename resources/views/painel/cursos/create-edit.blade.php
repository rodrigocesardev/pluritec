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

@if(isset($curso))
    <form class="form" method="post" action="{{route('cursos.update', $curso->id)}}">
        {!! method_field('PUT') !!}
@else
    <form class="form" method="post" action="{{route('cursos.store')}}">
@endif

    {!! csrf_field() !!}
    <div class="form-group">
        <input type="text" name="titulo" placeholder="Título:" class="form-control" value="{{(isset($curso))? $curso->titulo : old('titulo')}}">
    </div>
    <div class="form-group">
        <textarea name="descricao" placeholder="Descrição" class="form-control">{{(isset($curso))? $curso->descricao : old('descricao')}}</textarea>
    </div>
    
    @if(isset($curso))
        <button class="btn btn-primary">Atualizar</button>
    @else
        <button class="btn btn-primary">Cadastrar</button>
    @endif
    
    <a href="{{route('cursos.index')}}" class="btn btn-light">
        <span class="glyphicon glyphicon-chevron-left"></span> Voltar
    </a>
</form>
@endsection