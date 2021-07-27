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
            $table->bigIncrements('MalfunzionamentoId')->index();
            $table->bigInteger('prodottoId')->unsigned();
            $table->foreign('prodottoId')->references('prodottoId')->on('prodotti');
            $table->string('descrizione', 200);
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
