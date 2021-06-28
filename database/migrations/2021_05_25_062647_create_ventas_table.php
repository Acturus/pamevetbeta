<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo',8)->unique();
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedTinyInteger('id_estado');
            $table->decimal('costo_total', 7, 2);
            $table->boolean('tipo_entrega');
            $table->string('direccion', 200)->nullable();
            $table->date('fecha_entrega');
            $table->time('hora_entrega')->nullable();
            $table->string('motivo_anulacion', 300)->nullable();
            $table->timestamps();

            $table->foreign('id_cliente')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
