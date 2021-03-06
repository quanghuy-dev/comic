<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;
    protected $table = 'comics';
    protected $guarded = [];

    public function genres()
    {
        return $this->belongsToMany(Genres::class, 'genres_comic', 'comic_id', 'genre_id');
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function chapter()
    {
        return $this->hasOne(Chapter::class)->latest();
    }

    public function first_chapter()
    {
        return $this->hasOne(Chapter::class);
    }

    public function last_chapter()
    {
        return $this->hasOne(Chapter::class)->latest();
    }
}
