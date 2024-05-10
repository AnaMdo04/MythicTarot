<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $fillable = ['nombre_categoria', 'descripcion'];

    public function disenios()
    {
        return $this->belongsToMany(Disenio::class, 'categoria_has_disenio');
    }

    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'usuario_interes_categoria')->withPivot('nivel_interes');
    }
}
