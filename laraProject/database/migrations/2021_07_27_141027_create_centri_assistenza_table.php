<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;

class CreateCentriAssistenzaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centri_assistenza', function (Blueprint $table) {
            $table->bigIncrements('ID')->index();
            $table->string('ragione_sociale', Config::get('strings.global.nome'))->unique();
            $table->string('telefono', Config::get('strings.global.telefono'))->unique();
            $table->string('email')->unique();
            $table->string('descrizione', Config::get('strings.centro_assistenza.descrizione'));
            $table->string('via', Config::get('strings.centro_assistenza.via'));
            $table->string('città', Config::get('strings.centro_assistenza.città'));
            $table->string('cap', Config::get('strings.centro_assistenza.cap'));
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
        Schema::dropIfExists('centri');
    }
}
