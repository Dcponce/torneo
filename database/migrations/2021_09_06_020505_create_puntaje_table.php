<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePuntajeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puntaje', function (Blueprint $table) {
            $table->integer('idPuntaje')->primary();
            $table->integer('pg');
            $table->integer('pe');
            $table->integer('pp');
            $table->integer('np');
            $table->integer('gf');
            $table->integer('gc');
            $table->integer('df');
            $table->integer('pts');
            $table->integer('equipoId');
            $table->integer('grupoId');
            $table->foreign('equipoId', 'puntaje_ibfk_1')->references('idEquipos')->on('equipos');
            $table->foreign('grupoId', 'puntaje_ibfk_2')->references('idGrupo')->on('grupo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puntaje');
    }
}
