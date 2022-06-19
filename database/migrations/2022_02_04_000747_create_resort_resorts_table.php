<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResortResortsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resort_resorts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resort_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('name_ar');
            $table->string('name_en');
            $table->longText('details_ar');
            $table->longText('details_en');
            $table->string('price');
            $table->string('image');
            $table->timestamps();

            $table->foreign('resort_id')->references('id')->on('resorts')->onDelete('cascade')->onUpdate('cascade');
   
            $table->foreign('category_id')->references('id')->on('resort_categories')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resort_resorts');
    }
}
