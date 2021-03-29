<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutresDepensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autres_depenses', function (Blueprint $table) {
            $table->id('idDepenses');
            $table->date('dateDepenses');
            $table->string('type',255);
            $table->text('libelle');
            $table->integer('montant');
            $table->integer('admin_id')->unsigned();
            $table->foreign('admin_id')->references('user_id')->on('admins')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('autres_depenses');
    }
}
