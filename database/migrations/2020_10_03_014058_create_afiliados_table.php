<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAfiliadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('afiliados', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('id_afiliado');
            $table->BigInteger('fol_afil');
            $table->string('clv_elector');
            $table->string('folio_ine');
            $table->date('fecha_afi');
            $table->string('distro_fed');
            $table->unsignedBigInteger('seccion_id')->nullable();
            $table->unsignedBigInteger('persona_id')->nullable();
            $table->unsignedBigInteger('jerarquia_id')->nullable();
            $table->timestamps();
        });

        Schema::table('afiliados', function($table) {
            $table->foreign('seccion_id')->references('id_seccion')->on('secciones');
            $table->foreign('persona_id')->references('id_persona')->on('personas');
            $table->foreign('jerarquia_id')->references('id_jerarquia')->on('jerarquias');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('afiliados');
    }
}
