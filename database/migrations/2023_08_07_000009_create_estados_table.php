<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadosTable extends Migration
{
    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigoestado')->nullable();
            $table->string('nombre')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
