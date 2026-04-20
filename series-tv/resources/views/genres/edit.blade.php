@extends('layouts.app')

@section('content')
    <h1>Editar gènere</h1>

    <form action="{{ route('genres.update', $genre) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label for="name">Nom</label><br>
            <input type="text" name="name" id="name" value="{{ old('name', $genre->name) }}">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="description">Descripció</label><br>
            <input type="text" name="description" id="description" value="{{ old('description', $genre->description) }}">
        </div>

        <button type="submit">Actualitzar</button>
    </form>
@endsection