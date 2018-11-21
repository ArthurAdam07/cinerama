@extends('layouts.app')
@section('content')
<h1>filmes {{$filmes->id}}</h1>
<hr>
<h3><b>ID:</b> {{$filmes->id}}</h3>
<h3><b>Título:</b> {{$filmes->title}}</h3>
<h3><b>Sinopse:</b> {{\Carbon\Carbon::parse($filmes->scheduledto)->format('d/m/Y h:m')}}</h3>
<h3><b>Nota:</b> {{\Carbon\Carbon::parse($filmes->scheduledto)->format('d/m/Y h:m')}}</h3>
<h3><b>Ficha Técnica:</b> {{$filmes->description}}</h3>
<h3><b>Lançamento:</b> {{\Carbon\Carbon::parse($filmes->scheduledto)->format('d/m/Y h:m')}}</h3>
<h3><b>Criado em:</b> {{\Carbon\Carbon::parse($filmes->created_at)->format('d/m/Y h:m')}}</h3>
<h3><b>Atualizado em:</b> {{\Carbon\Carbon::parse($filmes->updated_at)->format('d/m/Y h:m')}}</h3>

@endsection



<!-- \Carbon\Carbon::parse($filmes->scheduledto)->format('d/m/Y h:m')  -->