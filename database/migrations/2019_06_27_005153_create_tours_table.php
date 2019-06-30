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
            $table->decimal('price', 8, 2);
            $table->unsignedInteger('country_id');
            $table->unsignedBigInteger('main_img_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('tour_type_id');
            $table->unsignedBigInteger('seller_id');
            $table->dateTime('start_at');
            $table->dateTime('finish_at');
            $table->unsignedInteger('start_location_id');
            $table->boolean('for_children')->default(true);
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
