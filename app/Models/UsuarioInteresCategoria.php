<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioInteresCategoria extends Model
{
    protected $table = 'usuario_interes_categoria';
    public $timestamps = false;
    public $incrementing = false;

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
