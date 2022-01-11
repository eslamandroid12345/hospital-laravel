<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceMedicansTable extends Migration
{

    public function up()
    {
        Schema::create('service_medicans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('medican_id')->unsigned();
            $table->integer('service_id')->unsigned();
            $table->timestamps();

            $table->foreign('medican_id')->references('id')->on('medicans')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');

        });
    }


    public function down()
    {
        Schema::dropIfExists('service_medicans');
    }
}
