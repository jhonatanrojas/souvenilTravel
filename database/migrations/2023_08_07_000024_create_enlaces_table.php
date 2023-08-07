<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnlacesTable extends Migration
{
    public function up()
    {
        Schema::create('enlaces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('url');
            $table->string('target')->nullable();
            $table->string('grupo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
