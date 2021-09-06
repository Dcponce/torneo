<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->integer('idUsuario')->primary();
            $table->integer('tipoUsuario');
            $table->string('nombre', 256);
            $table->string('clave', 256);
            $table->string('usuario', 100);
            $table->foreign('tipoUsuario', 'usuario_ibfk_1')->references('idTipo')->on('tipousuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}
