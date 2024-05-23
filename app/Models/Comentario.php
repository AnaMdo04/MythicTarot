<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;  // Make sure to import the User model

class Comentario extends Model
{
    protected $table = 'comentarios';
    protected $fillable = ['texto', 'fecha_comentario', 'lectura_id', 'user_id'];

    // Rename usuario() to user() to match your User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');  // Assuming 'usuario_id' is the correct foreign key
    }

    public function lectura()
    {
        return $this->belongsTo(Lectura::class);
    }
}
