<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('asignar_dias_profesores', function (Blueprint $table) {
            $table->integer('id_dia')->unsigned()->nullable();
            $table->integer('id_profesor')->unsigned()->nullable();
            $table->foreign('id_dia')->references('id_dia')->on('dias')->onDelete('cascade');
            $table->foreign('id_profesor')->references('id_profesor')->on('profesores')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('asignar_dias_profesores');
    }
};
