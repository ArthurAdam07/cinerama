@extends('layouts.app')
@section('content')
<center><h1>Excluir Filme</h1>
<hr>
<form action="/filmes/{{$filmes->id}}" method="POST">
	{{ csrf_field() }}
	{{ method_field('DELETE') }}
	<p>Você realmente deseja excluir o filme {{$filmes->id}}?</p>
	<input type="submit" value="Deletar">
</form>
</center>
@endsection