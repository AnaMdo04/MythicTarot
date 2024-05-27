<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = ['fecha_compra', 'total', 'user_id'];

    public function disenios()
    {
        return $this->belongsToMany(Disenio::class, 'compra_has_disenio');
    }
}
