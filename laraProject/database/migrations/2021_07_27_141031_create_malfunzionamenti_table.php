<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;

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
            $table->foreign('prodottoID')->references('ID')->on('prodotti')->onDelete('cascade');
            $table->string('descrizione', config('strings.malfunzionamento.descrizione'));
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
        Schema::dropIfExists('malfunzionamenti');
    }
}
