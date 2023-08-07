<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestadoresDeServiciosTable extends Migration
{
    public function up()
    {
        Schema::create('prestadores_de_servicios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_razon_social');
            $table->string('direccion');
            $table->string('telefono')->nullable();
            $table->string('telefono_2')->nullable();
            $table->string('nombre_representate')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
