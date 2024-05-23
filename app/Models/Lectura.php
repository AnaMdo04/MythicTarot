<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lectura extends Model
{
    protected $table = 'lecturas';
    protected $fillable = ['fecha_lectura', 'pregunta', 'respuesta', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
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
