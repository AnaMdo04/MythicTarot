<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioAmigosTable extends Migration
{
    public function up()
    {
        Schema::create('usuario_amigos', function (Blueprint $table) {
            $table->foreignId('user_id1')->constrained('users');
            $table->foreignId('user_id2')->constrained('users');
            $table->primary(['user_id1', 'user_id2']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuario_amigos');
    }
}
