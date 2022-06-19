<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantMealSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_meal_sizes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('meal_id')->nullable();
            $table->string('size')->nullable();
            $table->string('price');
            $table->timestamps();

            $table->foreign('meal_id')->references('id')->on('restaurant_meals')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurant_meal_sizes');
    }
}
