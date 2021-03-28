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
            $table->integer('fermier_id')->unsigned();
            $table->foreign('fermier_id')->references('user_id')->on('fermiers');
            $table->integer('ProductionLait_id')->unsigned();
            $table->foreign('ProductionLait_id')->references('idProductionLait')->on('production_laits');
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
