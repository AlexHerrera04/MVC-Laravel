<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Serie extends Model
{
    protected $fillable = [
        'user_id',
        'genre_id',
        'title',
        'platform',
        'release_year',
        'seasons',
        'episodes',
        'status',
        'rating',
        'synopsis',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }
}