<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEstadoEnvioToComprasTable extends Migration
{
    public function up()
    {
        Schema::table('compras', function (Blueprint $table) {
            $table->string('estado_envio')->default('Procesando');
            $table->string('tiempo_estimado')->nullable();
        });
    }

    public function down()
    {
        Schema::table('compras', function (Blueprint $table) {
            $table->dropColumn('estado_envio');
            $table->dropColumn('tiempo_estimado');
        });
    }
}
