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
        Schema::create('asignar_promocional', function (Blueprint $table) {
            $table->integer('id_materia')->unsigned()->nullable();
            $table->foreign('id_materia')->references('id_materia')->on('materias')->onDelete('cascade');
            
            $table->integer('id_prom')->unsigned()->nullable();
            $table->foreign('id_prom')->references('id_prom')->on('promocionales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignar_promocional');
    }
};
