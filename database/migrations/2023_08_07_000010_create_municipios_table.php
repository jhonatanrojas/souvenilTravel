<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipiosTable extends Migration
{
    public function up()
    {
        Schema::create('municipios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo_municipio');
            $table->string('nombre')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
