<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carta extends Model
{
    protected $table = 'cartas';
    protected $fillable = ['nombre_carta', 'descripcion', 'imagen_url', 'disenio_id', 'user_id'];

    public function disenio()
    {
        return $this->belongsTo(Disenio::class);
    }

    public function lecturas()
    {
        return $this->belongsToMany(Lectura::class, 'lectura_has_carta');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
