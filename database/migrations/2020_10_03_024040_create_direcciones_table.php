<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('id_direccion');
            $table->unsignedBigInteger('persona_id')->nullable();
            $table->string('direccion');
            $table->string('no_int');
            $table->string('no_ext');
            $table->string('localidad');
            $table->Integer('cp');
            $table->string('latitud');
            $table->string('longitud');
            $table->unsignedBigInteger('colonia_id')->nullable();
            $table->unsignedBigInteger('municipio_id')->nullable();
            $table->timestamps();
        });

        Schema::table('direcciones', function($table) {
            $table->foreign('persona_id')->references('id_persona')->on('personas');
            $table->foreign('municipio_id')->references('id_municipio')->on('municipios');
            $table->foreign('colonia_id')->references('id_colonia')->on('colonia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direcciones');
    }
}
