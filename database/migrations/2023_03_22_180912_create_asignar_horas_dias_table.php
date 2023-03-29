<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('asignar_horas_dias', function (Blueprint $table) {
            $table->integer('id_hora')->unsigned()->nullable();
            $table->integer('id_materia')->unsigned()->nullable();
            $table->foreign('id_hora')->references('id_hora')->on('horas')->onDelete('cascade');
            $table->foreign('id_materia')->references('id_materia')->on('materias')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('asignar_horas_dias');
    }
};
