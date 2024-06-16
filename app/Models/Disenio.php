<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disenio extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_disenio', 'descripcion', 'precio', 'imagen_url', 'artista_id'];

    public function cartas()
    {
        return $this->hasMany(Carta::class);
    }

    public function comentarios()
    {
        return $this->hasMany(CompraComentario::class);
    }
}
