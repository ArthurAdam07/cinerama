@extends('layouts.app')
@section('content')
<center><h1>Formulário de Edição de Filmes {{$filmes->id}}</h1>
<hr>

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

<form action="/filmes/{{$filmes->id}}" method="POST">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
	Título: <input type="text" name="title" value="{{$filmes->title}}"><br>
	Sinopse: <input type="text" name="synopsis" value="{{$filmes->synopsis}}"><br>
	Nota: <input type="text" name="note" value="{{$filmes->note}}"><br>
	Ficha Técnica: <input type="text" name="datasheet" value="{{$filmes->datasheet}}"><br>
	Lançamento: <input type="datetime-local" name="scheduledto" value="{{$filmes->scheduledto}}"><br>
	<input type="submit" value="Salvar">
</form>
</center>
@endsection