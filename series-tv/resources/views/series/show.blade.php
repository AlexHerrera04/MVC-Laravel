@extends('layouts.app')

@section('content')
    <h1>Detall de la sèrie</h1>

    <p><strong>Títol:</strong> {{ $series->title }}</p>
    <p><strong>Plataforma:</strong> {{ $series->platform }}</p>
    <p><strong>Gènere:</strong> {{ $series->genre->name }}</p>
    <p><strong>Any d'estrena:</strong> {{ $series->release_year }}</p>
    <p><strong>Temporades:</strong> {{ $series->seasons }}</p>
    <p><strong>Episodis:</strong> {{ $series->episodes }}</p>
    <p><strong>Estat:</strong> {{ $series->status }}</p>
    <p><strong>Valoració:</strong> {{ $series->rating }}</p>
    <p><strong>Sinopsi:</strong> {{ $series->synopsis }}</p>

    <p>
        <a href="{{ route('series.edit', $series) }}">Editar</a>
        <a href="{{ route('series.index') }}">Tornar</a>
    </p>
@endsection