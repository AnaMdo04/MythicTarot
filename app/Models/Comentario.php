<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'comentarios';
    protected $fillable = ['texto', 'fecha_comentario', 'lectura_id', 'usuario_id'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function lectura()
    {
        return $this->belongsTo(Lectura::class);
    }
}
