<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'profile_image', 'is_artist', 'register_date'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'register_date' => 'datetime',
    ];

    public function lecturas()
    {
        return $this->hasMany(Lectura::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function compras()
    {
        return $this->hasMany(Compra::class);
    }
}
