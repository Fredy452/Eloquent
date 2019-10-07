<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLevelIdAtUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Estamos editando la tabla users para agregar la referencia de level
        Schema::table('users', function (Blueprint $table){

          $table->bigInteger('level_id')->unsigned()
            ->nullable()//Para establecer que el campo es nulo
            ->after('id');//Para agregarlo despues del id

          //Para referenciar el id de la tabla levels
          $table->foreign('level_id')->references('id')->on('levels')
            ->onDelete('set null')//Para evitar que no se borre el usuario
            ->onUpdate('cascade');
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
