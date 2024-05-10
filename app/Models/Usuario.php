<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $fillable = ['nombre_usuario', 'correo', 'contraseña', 'fecha_registro', 'es_artista'];

    public function artista()
    {
        return $this->hasOne(Artista::class);
    }

    public function lecturas()
    {
        return $this->hasMany(Lectura::class);
    }

    public function compras()
    {
        return $this->hasMany(Compra::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function amigos()
    {
        return $this->belongsToMany(Usuario::class, 'usuario_amigos', 'usuario_id1', 'usuario_id2');
    }

    public function categoriasInteres()
    {
        return $this->belongsToMany(Categoria::class, 'usuario_interes_categoria')->withPivot('nivel_interes');
    }
}
