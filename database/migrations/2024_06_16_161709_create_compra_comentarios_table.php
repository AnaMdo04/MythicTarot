<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompraComentariosTable extends Migration
{
    public function up()
    {
        Schema::create('compra_comentarios', function (Blueprint $table) {
            $table->id();
            $table->text('texto');
            $table->timestamp('fecha_comentario')->useCurrent();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('compra_id')->constrained('compras')->onDelete('cascade');
            $table->foreignId('disenio_id')->constrained('disenios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('compra_comentarios');
    }
}
