<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompraHasDisenio extends Model
{
    protected $table = 'compra_has_disenio';
    public $timestamps = false;
    public $incrementing = false;

    public function compra()
    {
        return $this->belongsTo(Compra::class);
    }

    public function disenio()
    {
        return $this->belongsTo(Disenio::class);
    }
}
