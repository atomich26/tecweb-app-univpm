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
            $table->bigInteger('prodottoID')->unsigned();
            $table->foreign('prodottoID')->references('ID')->on('prodotti');
            $table->text('descrizione', 500);
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
