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
        Schema::create('fact_servicio', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->integer('nro_factura')->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id')->references('consecutivo')->on('servicio');
            $table->foreign('nro_factura')->references('nrofactura')->on('factura');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fact_servicio');
    }
};
