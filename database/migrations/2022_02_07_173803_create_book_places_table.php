<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_places', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('visitor_id')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->unsignedBigInteger('resort_id')->nullable();
            $table->unsignedBigInteger('place_id')->nullable();
            $table->string('days');
            $table->string('date_book');
            $table->string('money');
            $table->string('date_from');
            $table->string('date_to');
            $table->enum('status',[0,1,2])->default(0);
            $table->timestamps();

            $table->foreign('visitor_id')->references('id')->on('visitors')->onDelete('cascade')->onUpdate('cascade');
   
            $table->foreign('place_id')->references('id')->on('resort_resorts')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('resort_id')->references('id')->on('resorts')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_places');
    }
}
