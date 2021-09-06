<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partidos', function (Blueprint $table) {
            $table->integer('idPartido')->primary();
            $table->integer('numPartido');
            $table->integer('equipoL');
            $table->integer('equipoV');
            $table->date('fecha');
            $table->time('hora');
            $table->integer('arbitroId');
            $table->foreign('equipoL', 'partidos_ibfk_1')->references('idEquipos')->on('equipos');
            $table->foreign('equipoV', 'partidos_ibfk_2')->references('idEquipos')->on('equipos');
            $table->foreign('arbitroId', 'partidos_ibfk_3')->references('idArbitro')->on('arbrito');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partidos');
    }
}
