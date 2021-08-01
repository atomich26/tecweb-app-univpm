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
            $table->bigIncrements('ID')->index();
            $table->string('nome_utente', 25)->unique();
            $table->string('nome', 25);
            $table->string('cognome', 50);
            $table->timestamp('data_nascita')->nullable();
            $table->string('codice_fiscale', 16)->unique()->nullable();
            $table->string('email', 319)->unique()->nullable();
            $table->string('telefono', 10)->unique()->nullable();
            $table->string('password', 200)->unique();
            $table->string('ruolo', ['tecnico','staff','admin'])->default('tecnico');
            $table->bigInteger('centroID')->unsigned()->nullable();
            $table->foreign('centroID')->references('ID')->on('centri_assistenza');

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
