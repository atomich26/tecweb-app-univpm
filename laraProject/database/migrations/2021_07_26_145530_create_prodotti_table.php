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
            $table->set('categoria',[
                'Lavatrici e asciugatrici', 'Lavastoviglie', 'Climatizzatori',
                'Frigoriferi e Congelatori', 'Forni, Piani Cottura e Cappe'
            ]);
            $table->text('descrizione', 600);
            $table->text('specifiche', 350);
            $table->text('guida_installazione', 1000);
            $table->text('note', 600)->nullable();
            $table->string('file_img', 50)->default('imgDefault.png');
            $table->bigInteger('utenteID')->nullable();
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
