<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioCompraComentario extends Model
{
    protected $table = 'usuario_compra_comentario';
    public $timestamps = false;
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class);
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
