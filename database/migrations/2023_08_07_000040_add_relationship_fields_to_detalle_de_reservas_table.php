<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDetalleDeReservasTable extends Migration
{
    public function up()
    {
        Schema::table('detalle_de_reservas', function (Blueprint $table) {
            $table->unsignedBigInteger('reserva_id')->nullable();
            $table->foreign('reserva_id', 'reserva_fk_8840139')->references('id')->on('reservas');
            $table->unsignedBigInteger('producto_id')->nullable();
            $table->foreign('producto_id', 'producto_fk_8840140')->references('id')->on('products');
        });
    }
}
