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
        Schema::create('profesores', function (Blueprint $table) {
            $table->increments('id_profesor');
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            /* $table->string('nombrecompleto', 200); */
            /* $table->boolean('conocido')->nullable();
            $table->foreign('conocido')->references('conocido')->on('conocidos'); */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profesores');
    }
};
