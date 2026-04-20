<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GenreController extends Controller
{
    public function index(): View
    {
        $genres = auth()->user()->genres()->latest()->get();

        return view('genres.index', compact('genres'));
    }

    public function create(): View
    {
        return view('genres.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        auth()->user()->genres()->create($validated);

        return redirect()->route('genres.index')->with('success', 'Gènere creat correctament.');
    }

    public function show(Genre $genre): View
    {
        $genre = auth()->user()->genres()->findOrFail($genre->id);

        return view('genres.show', compact('genre'));
    }

    public function edit(Genre $genre): View
    {
        $genre = auth()->user()->genres()->findOrFail($genre->id);

        return view('genres.edit', compact('genre'));
    }

    public function update(Request $request, Genre $genre): RedirectResponse
    {
        $genre = auth()->user()->genres()->findOrFail($genre->id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $genre->update($validated);

        return redirect()->route('genres.index')->with('success', 'Gènere actualitzat correctament.');
    }

    public function destroy(Genre $genre): RedirectResponse
    {
        $genre = auth()->user()->genres()->findOrFail($genre->id);

        $genre->delete();

        return redirect()->route('genres.index')->with('success', 'Gènere eliminat correctament.');
    }
}