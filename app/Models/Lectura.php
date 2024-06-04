<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lectura extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_lectura',
        'pregunta',
        'respuesta',
        'user_id'
    ];

    public function cartas()
    {
        return $this->belongsToMany(Carta::class, 'lectura_has_carta');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}
