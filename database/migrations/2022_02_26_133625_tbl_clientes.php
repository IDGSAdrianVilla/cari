<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TblClientes', function (Blueprint $table) {
            $table->increments('PKTblClientes');
            $table->integer('FKTblDirecciones')->unsigned();
            $table->string('nombreCliente');
            $table->string('apellidoPaterno');
            $table->string('apellidoMaterno');
            $table->string('telefono', 10);
            $table->date('fechaAlta');
            $table->foreign('FKTblDirecciones')->references('PKTblDirecciones')->on('TblDirecciones');
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
