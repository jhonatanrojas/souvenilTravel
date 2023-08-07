<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDivisasTable extends Migration
{
    public function up()
    {
        Schema::create('divisas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo');
            $table->decimal('valor', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
