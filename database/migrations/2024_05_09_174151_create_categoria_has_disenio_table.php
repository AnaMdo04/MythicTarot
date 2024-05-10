<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriaHasDisenioTable extends Migration
{
    public function up()
    {
        Schema::create('categoria_has_disenio', function (Blueprint $table) {
            $table->foreignId('categoria_id')->constrained('categorias');
            $table->foreignId('disenio_id')->constrained('disenios');
            $table->primary(['categoria_id', 'disenio_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('categoria_has_disenio');
    }
}
