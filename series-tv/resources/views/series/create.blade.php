@extends('layouts.app')

@section('content')
    <h1>Crear sèrie</h1>

    <form action="{{ route('series.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 15px;">
            <label for="title">Títol</label><br>
            <input type="text" name="title" id="title" value="{{ old('title') }}">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="platform">Plataforma</label><br>
            <input type="text" name="platform" id="platform" value="{{ old('platform') }}">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="genre_id">Gènere</label><br>
            <select name="genre_id" id="genre_id">
                <option value="">Selecciona un gènere</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" @selected(old('genre_id') == $genre->id)>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="release_year">Any d'estrena</label><br>
            <input type="number" name="release_year" id="release_year" value="{{ old('release_year') }}">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="seasons">Temporades</label><br>
            <input type="number" name="seasons" id="seasons" value="{{ old('seasons', 1) }}">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="episodes">Episodis</label><br>
            <input type="number" name="episodes" id="episodes" value="{{ old('episodes', 1) }}">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="status">Estat</label><br>
            <select name="status" id="status">
                <option value="">Selecciona un estat</option>
                <option value="pendent" @selected(old('status') == 'pendent')>Pendent</option>
                <option value="veient" @selected(old('status') == 'veient')>Veient</option>
                <option value="acabada" @selected(old('status') == 'acabada')>Acabada</option>
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="rating">Valoració</label><br>
            <input type="number" name="rating" id="rating" min="1" max="10" value="{{ old('rating') }}">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="synopsis">Sinopsi</label><br>
            <textarea name="synopsis" id="synopsis" rows="4">{{ old('synopsis') }}</textarea>
        </div>

        <button type="submit">Guardar</button>
    </form>
@endsection