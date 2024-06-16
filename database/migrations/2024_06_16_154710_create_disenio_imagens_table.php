<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisenioImagensTable extends Migration
{
    public function up()
    {
        Schema::create('disenio_imagens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('disenio_id')->constrained('disenios')->onDelete('cascade');
            $table->string('imagen_url');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('disenio_imagens');
    }
}
