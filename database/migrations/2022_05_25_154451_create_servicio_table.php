<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicio', function (Blueprint $table) {
            $table->increments('consecutivo');
            $table->date('mi_fecha');
            $table->time('hora_entrada');
            $table->time('hora_salida');
            $table->integer('cliente_id')->unsigned();
            $table->integer('valorServicio');
            $table->integer('id_placa')->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('cliente');
            $table->foreign('id_placa')->references('id')->on('vehiculo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicio');
    }
};
