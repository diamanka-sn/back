<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchatBovinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achat_bovins', function (Blueprint $table) {
            $table->id('idAchat');
            $table->integer('montantBovin');
            $table->date('dateAchatBovin');
            $table->integer('bovin_id')->unsigned()->default(1);
            $table->foreign('bovin_id')->references('idBovin')->on('bovins');
            $table->integer('admin_id')->unsigned()->default(1);
<<<<<<< HEAD
            $table->foreign('admin_id')->references('user_id')->on('admins');
=======
            $table->foreign('admin_id')->references('user_id')->on('admins')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('achat_bovins');
    }
}
