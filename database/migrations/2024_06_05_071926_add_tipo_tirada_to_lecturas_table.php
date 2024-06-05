<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTipoTiradaToLecturasTable extends Migration
{
    public function up()
    {
        Schema::table('lecturas', function (Blueprint $table) {
            $table->string('tipo_tirada')->default('simple');
        });
    }

    public function down()
    {
        Schema::table('lecturas', function (Blueprint $table) {
            $table->dropColumn('tipo_tirada');
        });
    }
}
