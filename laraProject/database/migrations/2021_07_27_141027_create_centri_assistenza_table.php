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
            $table->string('ragione_sociale', config('strings.centri_assistenza.ragione_sociale'))->unique();
            $table->string('telefono', config('strings.global.telefono'))->unique();
            $table->string('email')->unique();
            $table->string('sito_web', config('strings.centri_assistenza.sito_web'))->nullable();
            $table->text('descrizione', config('strings.centro_assistenza.descrizione'))->nullable();
            $table->string('via', config('strings.centro_assistenza.via'));
            $table->string('città', config('strings.centro_assistenza.città'));
            $table->string('cap', config('strings.centro_assistenza.cap'));
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
