<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblReportes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TblReportes', function (Blueprint $table) {
            $table->increments('PKTblReportes');
            $table->integer('FKCatProblemas')->unsigned();
            $table->integer('FKTblEmpleadosRecibio')->unsigned();
            $table->integer('FKCatStatus')->unsigned();
            $table->integer('FKTblDetalleReporte')->unsigned();
            $table->integer('FKTblClientes')->unsigned();
            $table->string('descripcionProblema');
            $table->string('observaciones');
            $table->timestamp('fechaAlta');
            $table->foreign('FKCatProblemas')->references('PKCatProblemas')->on('CatProblemas');
            $table->foreign('FKTblEmpleadosRecibio')->references('PKTblEmpleados')->on('TblEmpleados');
            $table->foreign('FKCatStatus')->references('PKCatStatus')->on('CatStatus');
            $table->foreign('FKTblDetalleReporte')->references('PKTblDetalleReporte')->on('TblDetalleReporte');
            $table->foreign('FKTblClientes')->references('PKTblClientes')->on('TblClientes');
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
