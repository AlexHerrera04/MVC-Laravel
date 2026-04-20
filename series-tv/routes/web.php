<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\SerieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('series.index');
})->name('home');

Route::get('/dashboard', function () {
    return redirect()->route('series.index');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('genres', GenreController::class);
    Route::resource('series', SerieController::class);
});

require __DIR__.'/auth.php';