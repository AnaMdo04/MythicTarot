<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisenioImagen extends Model
{
    use HasFactory;

    protected $fillable = ['disenio_id', 'imagen_url'];

    public function disenio()
    {
        return $this->belongsTo(Disenio::class);
    }
}
