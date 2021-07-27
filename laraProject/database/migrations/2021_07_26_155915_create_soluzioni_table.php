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
        Schema::create('soluzioni', function (Blueprint $table) {
            $table->bigIncrements('soluzioneId')->index();
            $table->bigInteger('malfunzionamentoId');
            $table->foreign('malfunzionamentoId')->references('malfunzionamentoId')->on('malfunzionamenti');
            $table->string('soluzione', 1000);
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
