<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMalfunzionamentiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('malfunzionamenti', function (Blueprint $table) {
            $table->bigIncrements('ID')->index();
            $table->unsignedBigInteger('prodottoID');
            $table->foreign('prodottoID')->references('ID')->on('prodotti');
            $table->string('descrizione', 400);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('malfunzionamenti');
    }
}
