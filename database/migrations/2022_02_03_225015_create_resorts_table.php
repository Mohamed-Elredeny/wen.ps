<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResortsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resorts', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->unique();
            $table->bigInteger('orders')->default(0);
            $table->enum('status',[0,1]);
            $table->unsignedBigInteger('package_id')->nullable();
            $table->string("end_date_package")->nullable();
            $table->text('about_resort_ar')->nullable();
            $table->text('about_resort_en')->nullable();
            $table->string('start_work')->nullable();
            $table->string('end_work')->nullable();
            $table->string('logo')->nullable();
            $table->string('link_site_google_map')->nullable();
            $table->string('address')->nullable();
            $table->string('lng')->nullable();
            $table->string('lat')->nullable();
            $table->timestamps();

            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resorts');
    }
}
