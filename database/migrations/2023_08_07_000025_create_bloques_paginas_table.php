<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloquesPaginasTable extends Migration
{
    public function up()
    {
        Schema::create('bloques_paginas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('posicion');
            $table->string('pagina')->nullable();
            $table->string('tipo')->nullable();
            $table->longText('conetenido')->nullable();
            $table->integer('orden')->nullable();
            $table->boolean('estatus')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
