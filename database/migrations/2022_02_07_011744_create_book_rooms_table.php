<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('visitor_id')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->unsignedBigInteger('hotel_id')->nullable();
            $table->unsignedBigInteger('room_id')->nullable();
            $table->string('days');
            $table->string('date_book');
            $table->string('money');
            $table->string('date_from');
            $table->string('date_to');
            $table->enum('status',[0,1,2])->default(0);
            $table->timestamps();

            $table->foreign('visitor_id')->references('id')->on('visitors')->onDelete('cascade')->onUpdate('cascade');
   
            $table->foreign('room_id')->references('id')->on('hotel_rooms')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_rooms');
    }
}
