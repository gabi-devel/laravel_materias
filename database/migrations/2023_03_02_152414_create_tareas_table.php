<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->increments('id_tarea');
            $table->string('titulo', 100)->nullable();
            $table->text('descripcion')->nullable();
            $table->date('entrega')->nullable();/* $table->string('entrega', 300); */
            $table->integer('id_materia')->unsigned()->nullable();
            $table->foreign('id_materia')->references('id_materia')->on('materias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tareas');
    }
};
