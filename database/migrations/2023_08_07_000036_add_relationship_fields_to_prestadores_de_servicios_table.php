<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPrestadoresDeServiciosTable extends Migration
{
    public function up()
    {
        Schema::table('prestadores_de_servicios', function (Blueprint $table) {
            $table->unsignedBigInteger('estado_id')->nullable();
            $table->foreign('estado_id', 'estado_fk_8840483')->references('id')->on('estados');
            $table->unsignedBigInteger('municipio_id')->nullable();
            $table->foreign('municipio_id', 'municipio_fk_8840484')->references('id')->on('municipios');
            $table->unsignedBigInteger('user_regiter_id')->nullable();
            $table->foreign('user_regiter_id', 'user_regiter_fk_8840523')->references('id')->on('users');
        });
    }
}
