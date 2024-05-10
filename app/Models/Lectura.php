<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lectura extends Model
{
    protected $table = 'lecturas';
    protected $fillable = ['fecha_lectura', 'pregunta', 'respuesta', 'usuario_id'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function cartas()
    {
        return $this->belongsToMany(Carta::class, 'lectura_has_carta');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}
