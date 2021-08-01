<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('nome', 50);
            $table->string('modello', 20)->unique();
            $table->unsignedBigInteger('categoriaID');
            $table->foreign('categoriaID')->references('ID')->on('categorie');
            $table->string('descrizione', 600);
            $table->string('specifiche', 350);
            $table->string('guida_installazione', 1000);
            $table->string('note', 600)->nullable();
            $table->string('file_img', 50)->default('imgDefault.png');
            $table->unsignedBigInteger('utenteID')->nullable();
            $table->foreign('utenteID')->references('ID')->on('utenti');
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
