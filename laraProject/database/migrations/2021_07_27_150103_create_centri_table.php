<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centri', function (Blueprint $table) {
            $table->bigIncrements('centroId')->index();
            $table->string('nominativo',75);
            $table->bigInteger('telefono')->unique();
            $table->string('email')->unique();
            $table->string('via', 50);
            $table->string('cap', 7);
            $table->string('città', 80);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('centri');
    }
}
