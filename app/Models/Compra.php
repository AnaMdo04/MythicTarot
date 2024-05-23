<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'compras';
    protected $fillable = ['fecha_compra', 'total', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function disenios()
    {
        return $this->belongsToMany(Disenio::class, 'compra_has_disenio');
    }
}
