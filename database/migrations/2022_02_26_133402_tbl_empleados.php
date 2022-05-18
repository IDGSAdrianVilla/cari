<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblEmpleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TblEmpleados', function (Blueprint $table) {
            $table->increments('PKTblEmpleados');
            $table->integer('FKCatRoles')->unsigned();
            $table->string('nombreEmpleado');
            $table->string('apellidoPaterno');
            $table->string('apellidoMaterno');
            $table->date('fechaAlta');
            $table->string('usuario');
            $table->string('contrasenia');
            $table->foreign('FKCatRoles')->references('PKCatRoles')->on('CatRoles');
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
