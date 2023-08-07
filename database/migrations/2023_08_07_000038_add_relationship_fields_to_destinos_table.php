<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDestinosTable extends Migration
{
    public function up()
    {
        Schema::table('destinos', function (Blueprint $table) {
            $table->unsignedBigInteger('codigo_municipio_id')->nullable();
            $table->foreign('codigo_municipio_id', 'codigo_municipio_fk_8825546')->references('id')->on('municipios');
            $table->unsignedBigInteger('codigo_estado_id')->nullable();
            $table->foreign('codigo_estado_id', 'codigo_estado_fk_8825547')->references('id')->on('estados');
        });
    }
}
