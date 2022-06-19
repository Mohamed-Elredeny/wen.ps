<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->string('hotel_point')->default(0);
            $table->string('restaurant_point')->default(0);
            $table->string('resort_point')->default(0);
            $table->timestamps();
        });

        DB::table('points')->insert([
            'hotel_point' => 0,
            'restaurant_point' => 0,
            'resort_point' => 0,

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('points');
    }
}
