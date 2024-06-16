<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory;

    protected $fillable = [
        'name', 'email', 'password', 'profile_image', 'is_artist', 'register_date',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function cartas()
    {
        return $this->belongsToMany(Carta::class, 'carta_user_disenio')
            ->withPivot('disenio_id', 'imagen_url')
            ->withTimestamps();
    }
    public function comentarios()
    {
        return $this->hasMany(CompraComentario::class);
    }

    public function compras()
    {
        return $this->hasMany(Compra::class);
    }
    public function artistas()
    {
        return $this->hasMany(Artista::class);
    }
}
