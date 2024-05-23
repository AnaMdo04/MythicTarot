<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsuarioAmigo extends Model
{
    protected $table = 'usuario_amigos';
    public $timestamps = false;

    public function user1()
    {
        return $this->belongsTo(User::class, 'user_id1');
    }

    public function user2()
    {
        return $this->belongsTo(User::class, 'user_id2');
    }
}
