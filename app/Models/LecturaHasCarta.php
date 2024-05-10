<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LecturaHasCarta extends Model
{
    protected $table = 'lectura_has_carta';
    public $timestamps = false;
    public $incrementing = false;

    public function lectura()
    {
        return $this->belongsTo(Lectura::class);
    }

    public function carta()
    {
        return $this->belongsTo(Carta::class);
    }
}
