<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disenio extends Model
{
    protected $table = 'disenios';
    protected $fillable = ['nombre_disenio', 'precio', 'imagen_url', 'artista_id'];

    public function artista()
    {
        return $this->belongsTo(Artista::class);
    }

    public function cartas()
    {
        return $this->hasMany(Carta::class);
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'categoria_has_disenio');
    }

    public function compras()
    {
        return $this->belongsToMany(Compra::class, 'compra_has_disenio');
    }
}
