<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinosTable extends Migration
{
    public function up()
    {
        Schema::create('destinos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
