<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombres');
            $table->string('apellidos')->nullable();
            $table->integer('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->string('cedula')->nullable();
            $table->string('email');
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
