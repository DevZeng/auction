<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auctions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('car_id');
            $table->float('price');
            $table->integer('start_time');
            $table->integer('continue_time');
            $table->integer('add_time');
            $table->float('add_price');
            $table->unsignedInteger('use_coin');
            $table->unsignedInteger('margin');
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
        Schema::dropIfExists('auctions');
    }
}
