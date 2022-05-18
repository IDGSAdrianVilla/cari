<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblDirecciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TblDirecciones', function (Blueprint $table) {
            $table->increments('PKTblDirecciones');
            $table->integer('FKCatPoblaciones')->unsigned();
            $table->text('coordenadas');
            $table->text('referencias');
            $table->text('direccion');
            $table->foreign('FKCatPoblaciones')->references('PKCatPoblaciones')->on('CatPoblaciones');
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
