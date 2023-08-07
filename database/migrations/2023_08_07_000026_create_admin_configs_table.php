<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminConfigsTable extends Migration
{
    public function up()
    {
        Schema::create('admin_configs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('grupo');
            $table->string('codigo');
            $table->string('valor');
            $table->string('descripcion')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
