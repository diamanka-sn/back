<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBovinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bovins', function (Blueprint $table) {
            $table->id('idBovin');
<<<<<<< HEAD
            $table->string('codeBovin',255);
            $table->string('nom',255);
            $table->string('photo',255);
            $table->date('dateNaissance');
            $table->string('etatDeSante');
            $table->string('geniteur',255);
            $table->string('genitrice',255);
            $table->string('etat',255)->default('vivant');
            $table->string('situation',255);
            $table->integer('race_id')->unsigned()->default(1);
            $table->foreign('race_id')->references('idRace')->on('races');
            $table->integer('prix')->nullable();
=======
            $table->string('codeBovin', 255);
            $table->string('nom', 255);
            $table->string('photo', 255);
            $table->date('dateNaissance');
            $table->string('etatDeSante');
            $table->string('geniteur', 255);
            $table->string('genitrice', 255);
            $table->string('etat', 255)->default('vivant');
            $table->string('situation', 255);
            $table->integer('prix')->nullable();
            $table->integer('race_id')->unsigned()->default(1);
            $table->foreign('race_id')->references('idRace')->on('races');
>>>>>>> 764f3b8423924a5e5abea5b7cb9d24c978bfe902
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
        Schema::dropIfExists('bovins');
    }
}
