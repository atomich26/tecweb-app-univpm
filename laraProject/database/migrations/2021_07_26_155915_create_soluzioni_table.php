<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoluzioniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interventi', function (Blueprint $table) {
            $table->bigIncrements('ID')->index();
            $table->bigInteger('malfunzionamentoID');
            $table->foreign('malfunzionamentoID')->references('ID')->on('malfunzionamenti');
            $table->text('descrizione', 800);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('soluzioni');
    }
}
