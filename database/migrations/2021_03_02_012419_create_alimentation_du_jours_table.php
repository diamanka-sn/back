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
            $table->integer('fermier_id')->unsigned();
            $table->foreign('fermier_id')->references('user_id')->on('fermiers');
            $table->string('nomAlimentation',255);
            $table->float('quantite',255);
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
