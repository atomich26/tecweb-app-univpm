<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;

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
            $table->string('nome', Config::get('strings.utente.nome'))->nullable();
            $table->string('cognome', Config::get('strings.utente.cognome'))->nullable();
            $table->timestamp('dataNascita')->nullable();
            $table->string('email')->unique();
            $table->string('telefono', Config::get('strings.global.telefono'))->unique()->nullable();
            $table->string('username', Config::get('strings.utente.username'))->unique();
            $table->string('password');
            $table->set('role', ['tecnico', 'staff', 'admin'])->default('tecnico');
            $table->unsignedBigInteger('centroID')->nullable();
            $table->foreign('centroID')->references('ID')->on('centri_assistenza');
            $table->string('file_img')->nullable();
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
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
