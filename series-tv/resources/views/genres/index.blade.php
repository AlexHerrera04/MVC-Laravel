@extends('layouts.app')

@section('content')
    <h1>Llistat de gèneres</h1>

    <p>
        <a href="{{ route('genres.create') }}">Crear gènere</a>
    </p>

    @if ($genres->isEmpty())
        <p>No hi ha gèneres creats.</p>
    @else
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Descripció</th>
                    <th>Accions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($genres as $genre)
                    <tr>
                        <td>{{ $genre->name }}</td>
                        <td>{{ $genre->description }}</td>
                        <td>
                            <a href="{{ route('genres.show', $genre) }}">Veure</a>
                            <a href="{{ route('genres.edit', $genre) }}">Editar</a>

                            <form action="{{ route('genres.destroy', $genre) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Segur que vols eliminar aquest gènere?')">
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