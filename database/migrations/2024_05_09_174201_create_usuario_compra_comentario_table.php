<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioCompraComentarioTable extends Migration
{
    public function up()
    {
        Schema::create('usuario_compra_comentario', function (Blueprint $table) {
            $table->foreignId('usuario_id')->constrained('users');
            $table->foreignId('compra_id')->constrained('compras');
            $table->foreignId('comentario_id')->constrained('comentarios');
            $table->primary(['usuario_id', 'compra_id', 'comentario_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuario_compra_comentario');
    }
}
