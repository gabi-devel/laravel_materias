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
        Schema::create('parciales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orden');
            $table->text('info');
            $table->date('fecha')->nullable();
            $table->integer('id_materia')->unsigned()->nullable();
            $table->foreign('id_materia')->references('id_materia')->on('materias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parciales');
    }
};
