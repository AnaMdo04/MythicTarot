<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioAmigo extends Model
{
    protected $table = 'usuario_amigos';
    public $timestamps = false;

    public function usuario1()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id1');
    }

    public function usuario2()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id2');
    }
}
