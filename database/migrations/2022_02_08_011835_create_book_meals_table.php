<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_meals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('visitor_id')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->unsignedBigInteger('restaurant_id')->nullable();
            $table->unsignedBigInteger('meal_id')->nullable();
            $table->unsignedBigInteger('meal_size_id')->nullable();
            $table->string('qty');
            $table->string('money');
            $table->string('date_book');
            $table->enum('status',[0,1,2])->default(0);
            $table->timestamps();

            $table->foreign('visitor_id')->references('id')->on('visitors')->onDelete('cascade')->onUpdate('cascade');
   
            $table->foreign('meal_id')->references('id')->on('restaurant_meals')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('meal_size_id')->references('id')->on('restaurant_meal_sizes')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_meals');
    }
}
