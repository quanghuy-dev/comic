<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    use HasFactory;
    protected $table = 'genres';
    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Comic::class, 'genres_comic', 'genre_id', 'comic_id');
    }
}
