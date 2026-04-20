@extends('layouts.app')

@section('content')
    <h1>Llistat de sèries</h1>

    <p>
        <a href="{{ route('series.create') }}">Crear sèrie</a>
    </p>

    @if ($series->isEmpty())
        <p>No hi ha sèries creades.</p>
    @else
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Títol</th>
                    <th>Plataforma</th>
                    <th>Gènere</th>
                    <th>Estat</th>
                    <th>Temporades</th>
                    <th>Accions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($series as $serie)
                    <tr>
                        <td>{{ $serie->title }}</td>
                        <td>{{ $serie->platform }}</td>
                        <td>{{ $serie->genre->name }}</td>
                        <td>{{ $serie->status }}</td>
                        <td>{{ $serie->seasons }}</td>
                        <td>
                            <a href="{{ route('series.show', $serie) }}">Veure</a>
                            <a href="{{ route('series.edit', $serie) }}">Editar</a>

                            <form action="{{ route('series.destroy', $serie) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Segur que vols eliminar aquesta sèrie?')">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection