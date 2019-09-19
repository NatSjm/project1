<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description');
            $table->unsignedBigInteger('price');
            $table->unsignedInteger('country_id');
            $table->unsignedBigInteger('main_img_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('tour_type_id');
            $table->unsignedBigInteger('seller_id');
            $table->dateTime('start_at')->nullable();
            $table->dateTime('finish_at')->nullable();
            $table->unsignedInteger('start_location_id')->nullable();
            $table->boolean('for_children')->default(true);
            $table->boolean('recommended')->default(false);
            $table->boolean('hot')->default(false);
            $table->boolean('advertisement')->default(false);
            $table->unsignedInteger('nutrition_id');
            $table->unsignedInteger('hotel_id');
            $table->softDeletes();
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
        Schema::dropIfExists('tours');
    }
}
