<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResortImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resort_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resort_id')->nullable();
            $table->string('image');
            $table->timestamps();

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
        Schema::dropIfExists('resort_images');
    }
}
