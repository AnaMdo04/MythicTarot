<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompraComentario extends Model
{
    use HasFactory;

    protected $fillable = ['texto', 'user_id', 'disenio_id', 'compra_id', 'fecha_comentario'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function disenio()
    {
        return $this->belongsTo(Disenio::class);
    }

    public function compra()
    {
        return $this->belongsTo(Compra::class);
    }
}
