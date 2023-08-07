<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('monto', 15, 2);
            $table->string('moneda')->nullable();
            $table->decimal('tasa_de_cambio', 15, 2)->nullable();
            $table->date('fecha_de_pago')->nullable();
            $table->string('forma_de_pago')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
