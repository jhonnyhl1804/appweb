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
        Schema::create('vehiculo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('placa',10);
            $table->string('color',20);
            $table->string('modelo');
            $table->integer('idtipo')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('idtipo')->references('id_tipo')->on('tipo_vehiculo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehiculo');
    }
};
