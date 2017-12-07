<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('class');
            $table->string('model');
            $table->unsignedInteger('sign_time');
            $table->unsignedInteger('build_time');
            $table->string('price');
            $table->string('displacement');
            $table->string('standard');
            $table->string('real_mileage');
            $table->string('color');
            $table->string('configuration');
            $table->string('situation');
            $table->string('times');
            $table->string('region');
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
        Schema::dropIfExists('cars');
    }
}
