<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->integer('nro_adultos')->nullable();
            $table->integer('nro_ninos')->nullable();
            $table->string('direccion')->nullable();
            $table->date('diponible_desde')->nullable();
            $table->date('disponible_hasta')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->boolean('estatus')->default(0)->nullable();
            $table->string('latitud')->nullable();
            $table->string('logitud')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
