<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstatusPagosTable extends Migration
{
    public function up()
    {
        Schema::create('estatus_pagos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descripcion')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
