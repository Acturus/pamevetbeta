<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_servicio');
            $table->unsignedBigInteger('id_mascota');
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_usuario');
            $table->string('detalle', 3000)->nullable();
            $table->dateTime('inicio');
            $table->dateTime('fin');

            $table->foreign('id_servicio')->references('id')->on('servicios');
            $table->foreign('id_mascota')->references('id')->on('mascotas');
            $table->foreign('id_usuario')->references('id')->on('users');
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
        Schema::dropIfExists('consultas');
    }
}
