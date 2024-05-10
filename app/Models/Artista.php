<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    protected $table = 'artistas';
    protected $fillable = ['nombre_artista', 'biografia'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function disenios()
    {
        return $this->hasMany(Disenio::class);
    }
}
