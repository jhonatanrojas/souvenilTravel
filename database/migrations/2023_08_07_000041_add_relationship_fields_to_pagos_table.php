<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPagosTable extends Migration
{
    public function up()
    {
        Schema::table('pagos', function (Blueprint $table) {
            $table->unsignedBigInteger('reserva_id')->nullable();
            $table->foreign('reserva_id', 'reserva_fk_8840168')->references('id')->on('reservas');
        });
    }
}
