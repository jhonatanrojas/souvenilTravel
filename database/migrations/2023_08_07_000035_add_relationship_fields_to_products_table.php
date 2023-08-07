<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('estado_id')->nullable();
            $table->foreign('estado_id', 'estado_fk_8825682')->references('id')->on('estados');
            $table->unsignedBigInteger('destino_id')->nullable();
            $table->foreign('destino_id', 'destino_fk_8825683')->references('id')->on('destinos');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_8840342')->references('id')->on('product_categories');
        });
    }
}
