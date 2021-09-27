<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;

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
            $table->bigIncrements('ID')->index();
            $table->unsignedBigInteger('malfunzionamentoID');
            $table->foreign('malfunzionamentoID')->references('ID')->on('malfunzionamenti')->onDelete('cascade');
            $table->string('descrizione', Config::get('strings.soluzione.descrizione'));
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
        Schema::dropIfExists('soluzioni');
    }
}
