@extends('layouts.app')
@section('content')
<h1>Formulário de Cadastro de filmes</h1>
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

<form action="/filmes" method="post">
	{{ csrf_field() }}
	Título: 		<input type="text" name="title"><br>
	Sinopse:		<input type="text" name="synopsis"><br>
	Nota:		<input type="text" name="note"><br>
	Ficha Técnica:  <input type="text" name="datasheet"><br>
	Lançamento:  <input type="datetime-local" name="scheduledto"><br>
	<input type="submit" value="Salvar">
</form>
@endsection