<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carta extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_carta', 'descripcion', 'imagen_url', 'disenio_id'];

    public function disenio()
    {
        return $this->belongsTo(Disenio::class);
    }
}
