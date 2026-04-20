@extends('layouts.app')

@section('content')
    <h1>Editar sèrie</h1>

    <form action="{{ route('series.update', $series) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label for="title">Títol</label><br>
            <input type="text" name="title" id="title" value="{{ old('title', $series->title) }}">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="platform">Plataforma</label><br>
            <input type="text" name="platform" id="platform" value="{{ old('platform', $series->platform) }}">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="genre_id">Gènere</label><br>
            <select name="genre_id" id="genre_id">
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" @selected(old('genre_id', $series->genre_id) == $genre->id)>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="release_year">Any d'estrena</label><br>
            <input type="number" name="release_year" id="release_year" value="{{ old('release_year', $series->release_year) }}">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="seasons">Temporades</label><br>
            <input type="number" name="seasons" id="seasons" value="{{ old('seasons', $series->seasons) }}">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="episodes">Episodis</label><br>
            <input type="number" name="episodes" id="episodes" value="{{ old('episodes', $series->episodes) }}">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="status">Estat</label><br>
            <select name="status" id="status">
                <option value="pendent" @selected(old('status', $series->status) == 'pendent')>Pendent</option>
                <option value="veient" @selected(old('status', $series->status) == 'veient')>Veient</option>
                <option value="acabada" @selected(old('status', $series->status) == 'acabada')>Acabada</option>
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="rating">Valoració</label><br>
            <input type="number" name="rating" id="rating" min="1" max="10" value="{{ old('rating', $series->rating) }}">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="synopsis">Sinopsi</label><br>
            <textarea name="synopsis" id="synopsis" rows="4">{{ old('synopsis', $series->synopsis) }}</textarea>
        </div>

        <button type="submit">Actualitzar</button>
    </form>
@endsection