<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'texto',
        'fecha_comentario',
        'lectura_id',
        'user_id'
    ];

    public function lectura()
    {
        return $this->belongsTo(Lectura::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
