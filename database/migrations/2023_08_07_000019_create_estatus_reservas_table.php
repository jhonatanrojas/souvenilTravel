<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstatusReservasTable extends Migration
{
    public function up()
    {
        Schema::create('estatus_reservas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descripcion');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
