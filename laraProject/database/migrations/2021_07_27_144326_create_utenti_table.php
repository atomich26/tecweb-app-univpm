<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtentiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utenti', function (Blueprint $table) {
            $table->bigIncrements('utenteId')->index();
            $table->string('nome', 25);
            $table->string('cognome', 50);
            $table->date('dataNascita')->nullable();
            $table->string('via', 50)->nullable();
            $table->string('cap', 7)->nullable();
            $table->string('città', 80)->nullable();
            $table->string('CodFiscale', 16)->unique();
            $table->string('email', 100)->unique();
            $table->bigInteger('telefono')->unique();
            $table->string('ruolo',['tecnico','staff','admin'])->default('tecnico');
            $table->bigInteger('centroId')->nullable();
            $table->foreign('centroId')->references('centroId')->on('centri');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utenti');
    }
}
