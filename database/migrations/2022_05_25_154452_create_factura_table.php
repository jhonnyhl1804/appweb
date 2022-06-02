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
        Schema::create('factura', function (Blueprint $table) {
            $table->increments('nrofactura');
            $table->integer('formapago')->unsigned();
            $table->date('fecha');
            $table->integer('valor');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('formapago')->references('id_formapago')->on('forma_pago');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura');
    }
};
