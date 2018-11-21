@extends('layouts.app')
@section('content')
<p class="h1 text-center">Lista de filmes</p>

  <!-- EXIBE MENSAGENS DE SUCESSO -->
  @if(\Session::has('success'))
  <div class="container">
      <div class="alert alert-success">
        {{\Session::get('success')}}
      </div>
    </div>
  @endif

  <!-- EXIBE MENSAGENS DE ERROS -->
  @if ($errors->any())
  <div class="container">
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  </div>
  @endif

<div class="container">
@foreach($filmes as $f)
  <br>
  <div class="row">
    <div class="col-md-12">
     <p class="h3"><a href="/filmes/{{$f->id}}">{{$f->title}}</a></p>
     <p class="h5">Agendado para: <b>{{\Carbon\Carbon::parse($f->scheduledto)->format('d/m/Y h:m')}}</b></p>

      @auth
        <p class="h7">Ações: 
          <a class="btn btn-outline-primary btn-sm" href="/filmes/{{$f->id}}">Ver Mais</a>
          <a class="btn btn-outline-primary btn-sm" href="/filmes/{{$f->id}}/edit">Editar</a> 
          <a class="btn btn-outline-primary btn-sm" href="/filmes/{{$f->id}}/delete">Deletar</a>
        </p>
      @endauth
    </div>
  </div>
  <br>
@endforeach
</div>

{{ $filmes->links() }}

@auth
<br>
<br>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <p class="text-center"><a class="btn btn-primary" href="/filmes/create">Criar novo registro</a></p>
    </div>
</div>
</div>
@endauth

@endsection