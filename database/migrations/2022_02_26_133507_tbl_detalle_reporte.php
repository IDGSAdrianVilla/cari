<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblDetalleReporte extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TblDetalleReporte', function (Blueprint $table) {
            $table->increments('PKTblDetalleReporte');
            $table->string('diagnostico');
            $table->string('solucion');
            $table->integer('FKTblEmpleadosActualizo')->unsigned();
            $table->timestamp('fechaActualizacion');
            $table->integer('FKTblEmpleadosAtencion')->unsigned();
            $table->timestamp('fechaAtencion');
            $table->integer('FKTblEmpleadosAtediendo')->unsigned();
            $table->timestamp('fechaAtendiendo');
            $table->foreign('FKTblEmpleadosActualizo')->references('PKTblEmpleados')->on('TblEmpleados');
            $table->foreign('FKTblEmpleadosAtencion')->references('PKTblEmpleados')->on('TblEmpleados');
            $table->foreign('FKTblEmpleadosAtediendo')->references('PKTblEmpleados')->on('TblEmpleados');
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
