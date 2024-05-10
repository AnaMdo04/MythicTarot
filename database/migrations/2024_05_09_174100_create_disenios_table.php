<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiseniosTable extends Migration
{
    public function up()
    {
        Schema::create('disenios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_disenio', 100);
            $table->decimal('precio', 10, 2)->nullable();
            $table->string('imagen_url', 255)->nullable();
            $table->foreignId('artista_id')->constrained('artistas');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('disenios');
    }
}
