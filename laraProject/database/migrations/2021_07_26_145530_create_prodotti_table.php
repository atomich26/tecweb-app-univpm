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
            $table->bigIncrements('prodottoId')->index();
            $table->string('nome', 50);
            $table->string('modello', 30)->unique();
            $table->set('categoria',[
                'Lavatrice', 'Lavastoviglie', 'Condizionare',
                'Frigorifero', 'Congelatore', 'Forno', 'Microonde', 'Frullatore', 'Ferro da Stiro',
                ''
            ])->nullable();
            $table->string('descrizione', 100);
            $table->string('specifiche', 250);
            $table->string('installazione', 1000);
            $table->string('note buon uso', 1000)->nullable();
            $table->string('imgName', 150)->default('imgDefault.png');
            $table->bigInteger('utenteId')->nullable();
            $table->foreign('utenteId')->references('utenteId')->on('utenti');
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
