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
            $table->string('nome', config('strings.utente.nome'))->nullable();
            $table->string('cognome', config('strings.utente.cognome'))->nullable();
            $table->timestamp('data_nascita')->nullable();
            $table->string('email')->unique();
            $table->string('telefono', config('strings.global.telefono'))->unique()->nullable();
            $table->string('username', config('strings.utente.username'))->unique();
            $table->string('password');
            $table->set('role', ['tecnico', 'staff', 'admin'])->default('tecnico');
            $table->unsignedBigInteger('centroID')->nullable();
            $table->foreign('centroID')->references('ID')->on('centri_assistenza')->onDelete('cascade');
            $table->string('file_img')->nullable();
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('last_login')->nullable();
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
