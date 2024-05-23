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

    public function users()
    {
        return $this->belongsToMany(User::class, 'usuario_interes_categoria')->withPivot('nivel_interes');
    }
}
