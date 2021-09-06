<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultados', function (Blueprint $table) {
            $table->integer('idResultados')->primary();
            $table->integer('gl');
            $table->integer('gv');
            $table->integer('ganador');
            $table->integer('perdedor');
            $table->integer('partidoId');
            $table->foreign('partidoId', 'resultados_ibfk_1')->references('idPartido')->on('partidos');
            $table->foreign('ganador', 'resultados_ibfk_2')->references('idEquipos')->on('equipos');
            $table->foreign('perdedor', 'resultados_ibfk_3')->references('idEquipos')->on('equipos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resultados');
    }
}
