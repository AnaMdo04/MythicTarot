<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lectura extends Model
{
    use HasFactory;

    protected $fillable = ['fecha_lectura', 'pregunta', 'user_id', 'tipo_tirada'];

    public function cartas()
    {
        return $this->belongsToMany(Carta::class, 'lectura_has_carta')
                    ->withPivot('posicion', 'al_reves');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}
