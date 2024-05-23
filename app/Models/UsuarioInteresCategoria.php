<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioInteresCategoria extends Model
{
    protected $table = 'usuario_interes_categoria';
    public $timestamps = false;
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
