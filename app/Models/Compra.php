<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'compras';
    protected $fillable = ['fecha_compra', 'total', 'usuario_id'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function disenios()
    {
        return $this->belongsToMany(Disenio::class, 'compra_has_disenio');
    }
}
