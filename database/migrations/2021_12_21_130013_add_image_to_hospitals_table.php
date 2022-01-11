<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToHospitalsTable extends Migration
{

    public function up()
    {
        Schema::table('hospitals', function (Blueprint $table) {

            $table->string('image');
        });
    }


    public function down()
    {
        Schema::table('hospitals', function (Blueprint $table) {
            //
        });
    }
}
