<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url')->nullable();
            $table->string('target')->nullable();
            $table->string('titulo')->nullable();
            $table->longText('html')->nullable();
            $table->string('ubicacion');
            $table->integer('orden')->nullable();
            $table->boolean('estatus')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
