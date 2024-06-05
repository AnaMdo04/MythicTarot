<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartaUserDisenioTable extends Migration
{
    public function up()
    {
        Schema::create('carta_user_disenio', function (Blueprint $table) {
            $table->foreignId('carta_id')->constrained('cartas');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('disenio_id')->constrained('disenios');
            $table->string('imagen_url')->nullable();
            $table->primary(['carta_id', 'user_id', 'disenio_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('carta_user_disenio');
    }
}
