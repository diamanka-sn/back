<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaches', function (Blueprint $table) {
            $table->id('idBovin');
            $table->string('codeBovin', 255);
            $table->string('nom', 255);
            $table->string('photo', 255);
            $table->date('dateNaiss');
            $table->string('etatDeSante');
            $table->string('geniteur', 255);
            $table->string('genitrice', 255);
            $table->string('etat', 255);
            $table->string('situation', 255);
            $table->integer('idRace')->unsigned();
            $table->integer('idPeriode')->unsigned();
            $table->foreign('idRace')->references('idRace')->on('commandes');
            $table->foreign('idPeriode')->references('idPeriode')->on('periodes');
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
        Schema::dropIfExists('vaches');
    }
}
