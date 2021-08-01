<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentriTable extends Migration
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
            $table->string('ragione_sociale',50)->unique();
            $table->string('telefono', 10)->unique();
            $table->string('email',100)->unique();
            $table->string('descrizione', 500);
            $table->string('via', 50);
            $table->string('cap', 5);
            $table->string('città', 50);
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
