<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToReservasTable extends Migration
{
    public function up()
    {
        Schema::table('reservas', function (Blueprint $table) {
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->foreign('cliente_id', 'cliente_fk_8840084')->references('id')->on('clientes');
            $table->unsignedBigInteger('prestado_de_servicio_id')->nullable();
            $table->foreign('prestado_de_servicio_id', 'prestado_de_servicio_fk_8840090')->references('id')->on('prestadores_de_servicios');
            $table->unsignedBigInteger('estatus_reserva_id')->nullable();
            $table->foreign('estatus_reserva_id', 'estatus_reserva_fk_8840154')->references('id')->on('estatus_reservas');
        });
    }
}
