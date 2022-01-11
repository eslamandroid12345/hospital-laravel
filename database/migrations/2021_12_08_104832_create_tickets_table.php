<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{

    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('phone');
            $table->string('patient_address',100);
            $table->string('operation',50);
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
