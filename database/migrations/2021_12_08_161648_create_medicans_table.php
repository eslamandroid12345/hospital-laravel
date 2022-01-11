<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicansTable extends Migration
{

    public function up()
    {
        Schema::create('medicans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hospital_id')->unsigned();
            $table->string('doctor_name',50);
            $table->string('doctor_phone',50);
            $table->string('doctor_address',50);
            $table->integer('salary');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('hospital_id')->references('id')->on('profile')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('medicans');
    }
}
