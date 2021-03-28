<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchatAlimentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achat_aliments', function (Blueprint $table) {
            $table->id('idAchatAliment');
            $table->string('nomAliment',255);
            $table->float('quantite');
            $table->integer('montant');
            $table->date('dateAchatAliment');
            $table->integer('admin_id')->unsigned();
            $table->foreign('admin_id')->references('user_id')->on('admins');
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
        Schema::dropIfExists('achat_aliments');
    }
}
