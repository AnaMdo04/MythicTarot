<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompraHasDisenioTable extends Migration
{
    public function up()
    {
        Schema::create('compra_has_disenio', function (Blueprint $table) {
            $table->foreignId('compra_id')->constrained('compras');
            $table->foreignId('disenio_id')->constrained('disenios');
            $table->primary(['compra_id', 'disenio_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('compra_has_disenio');
    }
}
