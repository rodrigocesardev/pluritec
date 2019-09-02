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

@if(isset($aluno))
    <form class="form" method="post" action="{{route('alunos.update', $aluno->id)}}">
        {!! method_field('PUT') !!}
@else
    <form class="form" method="post" action="{{route('alunos.store')}}">
@endif

    {!! csrf_field() !!}
    <div class="form-group">
        <input type="text" name="nome" placeholder="Nome:" class="form-control" value="{{(isset($aluno))? $aluno->nome : old('nome')}}">
    </div>
    <div class="form-group">
        <input type="text" name="email" placeholder="E-mail:" class="form-control" value="{{(isset($aluno))? $aluno->email : old('email')}}">
    </div>
    <div class="form-group">
       <select name="sexo" class="form-control">
           <option value="">Escolha a opção</option>
           <option value="M" {{ (isset($aluno) && $aluno->sexo == 'M' || old('sexo') == 'M')?'selected':''}}>Masculino</option>
           <option value="F" {{(isset($aluno) && $aluno->sexo == 'F' || old('sexo') == 'F')?'selected':''}}>Feminino</option>
       </select>
    </div>
    <div class="form-group">
        <input type="date" name="nascimento" placeholder="Nascimento:" style="height: auto;" class="form-control" value="{{(isset($aluno))? $aluno->nascimento : old('nascimento')}}">
    </div>
    
    @if(isset($aluno))
        <button class="btn btn-primary">Atualizar</button>
    @else
        <button class="btn btn-primary">Cadastrar</button>
    @endif
    
    <a href="{{route('alunos.index')}}" class="btn btn-light">
        <span class="glyphicon glyphicon-chevron-left"></span> Voltar
    </a>
</form>
@endsection