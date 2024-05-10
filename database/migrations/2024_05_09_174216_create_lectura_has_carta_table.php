<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturaHasCartaTable extends Migration
{
    public function up()
    {
        Schema::create('lectura_has_carta', function (Blueprint $table) {
            $table->foreignId('lectura_id')->constrained('lecturas');
            $table->foreignId('carta_id')->constrained('cartas');
            $table->primary(['lectura_id', 'carta_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('lectura_has_carta');
    }
}
