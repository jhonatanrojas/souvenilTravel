<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nro_reserva')->unique();
            $table->decimal('subtotal', 15, 2);
            $table->decimal('total', 15, 2)->nullable();
            $table->string('moneda')->nullable();
            $table->decimal('tasa_de_cambio', 15, 2)->nullable();
            $table->date('fecha_reserva');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
