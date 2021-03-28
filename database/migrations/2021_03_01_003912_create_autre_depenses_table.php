<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutreDepensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autre_depenses', function (Blueprint $table) {
            $table->id('idDepenses');
            $table->date('dateDepenses');
            $table->string('type',255);
            $table->text('libelle');
            $table->integer('montant');
            $table->integer('admin_id')->unsigned();
<<<<<<< HEAD
            $table->foreign('admin_id')->references('user_id')->on('utilisateurs');
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
        Schema::dropIfExists('autre_depenses');
    }
}
