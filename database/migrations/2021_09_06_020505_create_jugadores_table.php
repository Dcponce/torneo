<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJugadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jugadores', function (Blueprint $table) {
            $table->integer('idJugador')->primary();
            $table->string('jugador', 256)->nullable();
            $table->integer('numero')->nullable();
            $table->integer('goles')->nullable();
            $table->integer('tr')->nullable();
            $table->integer('ta')->nullable();
            $table->integer('equipoId')->nullable();
            $table->foreign('equipoId', 'jugadores_ibfk_1')->references('idEquipos')->on('equipos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jugadores');
    }
}
