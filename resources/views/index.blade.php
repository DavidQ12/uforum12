@extends('layouts.app')

@section('content')
    <h1>Publicaciones</h1>
    @foreach ($publicaciones as $publicacion)
        <div class="publicacion">
            <h2>{{ $publicacion['titulo'] }}</h2>
            <p>{{ $publicacion['contenido'] }}</p>
            <p>Autor: {{ $publicacion['autor'] }}</p>
        </div>
    @endforeach
@endsection
