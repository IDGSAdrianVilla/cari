<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CatPoblaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CatPoblaciones', function (Blueprint $table) {
            $table->increments('PKCatPoblaciones');
            $table->string('nombrePoblacion',20);
            $table->string('codigoPostal',5);
            $table->date('fechaAlta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
