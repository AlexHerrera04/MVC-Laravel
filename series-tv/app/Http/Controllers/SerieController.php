<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SerieController extends Controller
{
    public function index(): View
    {
        $series = auth()->user()->series()->with('genre')->latest()->get();

        return view('series.index', compact('series'));
    }

    public function create(): View
    {
        $genres = auth()->user()->genres()->orderBy('name')->get();

        return view('series.create', compact('genres'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'platform' => 'required|string|max:255',
            'genre_id' => 'required|exists:genres,id',
            'release_year' => 'nullable|integer|min:1900|max:2100',
            'seasons' => 'required|integer|min:1',
            'episodes' => 'required|integer|min:1',
            'status' => 'required|in:pendent,veient,acabada',
            'rating' => 'nullable|integer|min:1|max:10',
            'synopsis' => 'nullable|string|max:2000',
        ]);

        auth()->user()->series()->create($validated);

        return redirect()->route('series.index')->with('success', 'Sèrie creada correctament.');
    }

    public function show(Serie $series): View
    {
        $series = auth()->user()->series()->with('genre')->findOrFail($series->id);

        return view('series.show', compact('series'));
    }

    public function edit(Serie $series): View
    {
        $series = auth()->user()->series()->findOrFail($series->id);
        $genres = auth()->user()->genres()->orderBy('name')->get();

        return view('series.edit', compact('series', 'genres'));
    }

    public function update(Request $request, Serie $series): RedirectResponse
    {
        $series = auth()->user()->series()->findOrFail($series->id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'platform' => 'required|string|max:255',
            'genre_id' => 'required|exists:genres,id',
            'release_year' => 'nullable|integer|min:1900|max:2100',
            'seasons' => 'required|integer|min:1',
            'episodes' => 'required|integer|min:1',
            'status' => 'required|in:pendent,veient,acabada',
            'rating' => 'nullable|integer|min:1|max:10',
            'synopsis' => 'nullable|string|max:2000',
        ]);

        $series->update($validated);

        return redirect()->route('series.index')->with('success', 'Sèrie actualitzada correctament.');
    }

    public function destroy(Serie $series): RedirectResponse
    {
        $series = auth()->user()->series()->findOrFail($series->id);

        $series->delete();

        return redirect()->route('series.index')->with('success', 'Sèrie eliminada correctament.');
    }
}