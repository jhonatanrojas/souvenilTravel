<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdiomasTable extends Migration
{
    public function up()
    {
        Schema::create('idiomas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo')->nullable();
            $table->string('texto');
            $table->string('lang')->nullable();
            $table->string('posicion')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
