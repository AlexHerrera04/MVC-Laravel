@extends('layouts.app')

@section('content')
    <h1>Crear gènere</h1>

    <form action="{{ route('genres.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 15px;">
            <label for="name">Nom</label><br>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="description">Descripció</label><br>
            <input type="text" name="description" id="description" value="{{ old('description') }}">
        </div>

        <button type="submit">Guardar</button>
    </form>
@endsection