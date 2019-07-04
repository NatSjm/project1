<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('main_img_id')->references('id')->on('media');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('tour_type_id')->references('id')->on('tour_types');
            $table->foreign('start_location_id')->references('id')->on('locations');
            $table->foreign('nutrition_id')->references('id')->on('nutrition');
            $table->foreign('hotel_id')->references('id')->on('hotels');
            $table->foreign('seller_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->dropForeign(['country_id']);
            $table->dropForeign(['main_img_id']);
            $table->dropForeign(['category_id']);
            $table->dropForeign(['tour_type_id']);
            $table->dropForeign(['start_location_id']);
            $table->dropForeign(['nutrition_id']);
            $table->dropForeign(['hotel_id']);
            $table->dropForeign(['seller_id']);
            //
        });
    }
}
