<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('horas', function (Blueprint $table) {
            $table->increments('id_hora');
            $table->string('hora', 20)->nullable();
        });

        Schema::table('horas', function (Blueprint $table) {
            //
        });
        DB::table("horas")->insert(['hora' => "18 a 20" ]);
        DB::table("horas")->insert(['hora' => "20 a 22" ]);
    }

    public function down()
    {
        Schema::dropIfExists('horas');
    }
};
