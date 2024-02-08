<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Track extends Model implements HasMedia 
{
    use HasFactory;
    use interactsWithMedia;

    protected $fillable = [
        'name',
        'artist_id',
        'artwork',
        'genre',
        'year',
        'duration',
        'track',
    ];

    public function artist(): BelongsTo
    {
        return $this->belongsTo(Artist::class);
    }

}
