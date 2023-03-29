<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('asignar_materia', function (Blueprint $table) {
            $table->integer('id_materia')->unsigned()->nullable();
            $table->integer('id_profesor')->unsigned()->nullable();
            $table->foreign('id_materia')->references('id_materia')->on('materias')->onDelete('cascade');
            $table->foreign('id_profesor')->references('id_profesor')->on('profesores')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('asignar_materia');
    }
};
