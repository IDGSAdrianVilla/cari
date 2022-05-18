<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CatProblemas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CatProblemas', function (Blueprint $table) {
            $table->increments('PKCatProblemas');
            $table->string('nombreProblema',20);
            $table->string('descripcionProblema',255);
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
