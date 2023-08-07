<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleDeReservasTable extends Migration
{
    public function up()
    {
        Schema::create('detalle_de_reservas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cant_adultos');
            $table->integer('cant_ninos')->nullable();
            $table->date('fecha_desde')->nullable();
            $table->date('fecha_hasta')->nullable();
            $table->string('moneda')->nullable();
            $table->decimal('tasa_de_cambio', 15, 2)->nullable();
            $table->decimal('precio', 15, 2);
            $table->decimal('total', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
