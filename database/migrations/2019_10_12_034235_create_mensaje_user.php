<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensajeUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensaje_user', function (Blueprint $table) {
            //$table->bigIncrements('id');
            $table->integer('mensaje_id')->unsigned(); //unsigned sol ovalores positivos
            $table->integer('user_id')->unsigned(); 
            $table->integer('receptor_id')->unsigned(); 
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
        Schema::dropIfExists('mensaje_user');
    }
}
