<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'stage_name', 
        'avatar',  
    ];

    public function tracks(): HasMany
    {
        return $this->hasMany(Track::class);
    }
}
