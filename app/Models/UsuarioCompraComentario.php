<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioCompraComentario extends Model
{
    protected $table = 'usuario_compra_comentario';
    public $timestamps = false;
    public $incrementing = false;

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function compra()
    {
        return $this->belongsTo(Compra::class);
    }

    public function comentario()
    {
        return $this->belongsTo(Comentario::class);
    }
}
