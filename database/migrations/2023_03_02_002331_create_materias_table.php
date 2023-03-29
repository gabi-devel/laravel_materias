<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('materias', function (Blueprint $table) {
            $table->increments('id_materia');
            $table->integer('id_user')->unsigned();
            $table->string('nombre', 100);/* ->unique() */
            $table->string('descripcion', 100)->nullable();

            $table->integer('id_dia')->unsigned()->nullable();
            
        });
        Schema::table('materias', function($table)
        {
            $table->foreign('id_dia')
                  ->references('id_dia')
                  ->on('dias')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('materias');
    }
};
