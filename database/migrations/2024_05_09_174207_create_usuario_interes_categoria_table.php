<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioInteresCategoriaTable extends Migration
{
    public function up()
    {
        Schema::create('usuario_interes_categoria', function (Blueprint $table) {
            $table->foreignId('usuario_id')->constrained('users');
            $table->foreignId('categoria_id')->constrained('categorias');
            $table->string('nivel_interes', 50);
            $table->primary(['usuario_id', 'categoria_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuario_interes_categoria');
    }
}
