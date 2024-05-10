<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartasTable extends Migration
{
    public function up()
    {
        Schema::create('cartas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_carta', 100);
            $table->text('descripcion')->nullable();
            $table->string('imagen_url', 255)->nullable();
            $table->foreignId('disenio_id')->constrained('disenios');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cartas');
    }
}
