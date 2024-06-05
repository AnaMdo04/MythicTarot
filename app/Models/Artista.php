<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    protected $table = 'artistas';
    protected $fillable = ['nombre_artista', 'biografia', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function disenios()
    {
        return $this->hasMany(Disenio::class);
    }
}
