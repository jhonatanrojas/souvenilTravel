<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestadoresDeServicioProductPivotTable extends Migration
{
    public function up()
    {
        Schema::create('prestadores_de_servicio_product', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'product_id_fk_8840341')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('prestadores_de_servicio_id');
            $table->foreign('prestadores_de_servicio_id', 'prestadores_de_servicio_id_fk_8840341')->references('id')->on('prestadores_de_servicios')->onDelete('cascade');
        });
    }
}
