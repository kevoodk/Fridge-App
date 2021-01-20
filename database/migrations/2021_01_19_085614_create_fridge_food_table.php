<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFridgeFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fridge_food', function (Blueprint $table) {
            $table->id();
            $table->dateTime('expire_date', $precision = 0);
            $table->unsignedBigInteger('fridge_id');
            $table->foreign('fridge_id')->references('id')->on('fridges');
            $table->unsignedBigInteger('food_id');
            $table->foreign('food_id')->references('id')->on('food_items');
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
        Schema::dropIfExists('fridge_food');
    }
}
