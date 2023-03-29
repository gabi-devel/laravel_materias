<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dias', function (Blueprint $table) {
            $table->increments('id_dia');
            $table->string('dia', 20)->nullable();
            $table->string('orden', 50)->nullable();/* $table->boolean('orden')->nullable(); */
            $table->string('aniocarrera', 20)->nullable();/* $table->integer('aniocarrera')->nullable(); */
        });
        /* Schema::create('conocidos', function (Blueprint $table) {
            $table->boolean('conocido')->unique()->nullable();
            $table->string('descripcion', 100);
        }); */

        Schema::table('dias', function (Blueprint $table) {
            //
        });
        DB::table("dias")->insert(['dia' => "Lunes" ]);
        DB::table("dias")->insert(['dia' => "Martes" ]);
        DB::table("dias")->insert(['dia' => "Miércoles" ]);
        DB::table("dias")->insert(['dia' => "Jueves" ]);
        DB::table("dias")->insert(['dia' => "Viernes" ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dias');
    }
};
