<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{

    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('service_name',100);
            $table->time('service_from');
            $table->time('service_to');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('services');
    }
}
