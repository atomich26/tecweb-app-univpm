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
            $table->string('nome', config('strings.prodotto.nome'));
            $table->string('modello', config('strings.prodotto.modello'))->unique();
            $table->unsignedBigInteger('categoriaID');
            $table->foreign('categoriaID')->references('ID')->on('categorie');
            $table->mediumText('descrizione');
            $table->mediumText('specifiche');
            $table->mediumText('guida_installazione')->nullable();
            $table->mediumText('note_uso')->nullable();
            $table->string('file_img')->nullable();
            $table->unsignedBigInteger('utenteID')->nullable();
            $table->foreign('utenteID')->references('ID')->on('utenti')->onDelete('set null');
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
