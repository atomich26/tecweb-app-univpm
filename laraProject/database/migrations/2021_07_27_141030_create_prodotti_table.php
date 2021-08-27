<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;

class CreateProdottiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodotti', function (Blueprint $table) {
            $table->bigIncrements('ID')->index();
            $table->string('nome', Config::get('strings.global.nome'));
            $table->string('modello', Config::get('strings.prodotto.modello'))->unique();
            $table->unsignedBigInteger('categoriaID');
            $table->foreign('categoriaID')->references('ID')->on('categorie');
            $table->string('descrizione', Config::get('strings.prodotto.descrizione'));
            $table->string('specifiche', Config::get('strings.prodotto.specifiche'));
            $table->string('guida_installazione', Config::get('strings.prodotto.guida_installazione'))->nullable();
            $table->string('note_uso', Config::get('strings.prodotto.note_uso'))->nullable();
            $table->string('file_img')->nullable()->default('default-user.jpg');
            $table->unsignedBigInteger('utenteID')->nullable();
            $table->foreign('utenteID')->references('ID')->on('utenti');
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
        Schema::dropIfExists('prodotti');
    }
}
