<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraiteDuJoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traite_du_jours', function (Blueprint $table) {
            $table->id('idTraiteDuJour');
            $table->date('dateTraite');
            $table->float('traiteMatin');
            $table->float('traiteSoir');
            $table->integer('idUtilisateur')->unsigned();
            $table->foreign('idUtilisateur')->references('idUtilisateur')-> on ('idUtilisateus');
            $table->integer('idProductionLait')->unsigned();
            $table->foreign('idProductionLait')->references('idProductionLait')->on('production_laits');
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
        Schema::dropIfExists('traite_du_jours');
    }
}
