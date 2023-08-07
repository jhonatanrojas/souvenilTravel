<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMunicipiosTable extends Migration
{
    public function up()
    {
        Schema::table('municipios', function (Blueprint $table) {
            $table->unsignedBigInteger('codigo_estado_id')->nullable();
            $table->foreign('codigo_estado_id', 'codigo_estado_fk_8825539')->references('id')->on('estados');
        });
    }
}
