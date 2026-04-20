@extends('layouts.app')

@section('content')
    <h1>Detall del gènere</h1>

    <p><strong>Nom:</strong> {{ $genre->name }}</p>
    <p><strong>Descripció:</strong> {{ $genre->description }}</p>

    <p>
        <a href="{{ route('genres.edit', $genre) }}">Editar</a>
        <a href="{{ route('genres.index') }}">Tornar</a>
    </p>
@endsection