<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlimentationDuJoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alimentation_du_jours', function (Blueprint $table) {
            $table->id('idAlimentation');
            $table->integer('idUtilisateur')->unsigned();
            $table->foreign('idUtilisateur')->references('idUtilisateur')->on('utilisateurs');
            $table->string('nomAlimentation',255);
            $table->float('quantiteAlimentation',255);
            $table->date('date');
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
        Schema::dropIfExists('alimentation_du_jours');
    }
}
