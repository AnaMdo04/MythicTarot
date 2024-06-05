<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carta extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_carta', 'descripcion', 'imagen_url', 'disenio_id', 'al_reves', 'user_id'];

    public function disenio()
    {
        return $this->belongsTo(Disenio::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'carta_user_disenio')
                    ->withPivot('disenio_id', 'imagen_url')
                    ->withTimestamps();
    }
}
