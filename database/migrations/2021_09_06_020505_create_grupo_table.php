<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrupoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo', function (Blueprint $table) {
            $table->integer('idGrupo')->primary();
            $table->char('grupo', 1);
            $table->integer('max_equipos');
            $table->integer('torneoId');
            $table->foreign('torneoId', 'grupo_ibfk_1')->references('idToreno')->on('torneo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupo');
    }
}
