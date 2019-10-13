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
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('main_img_id')->references('id')->on('media')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('tour_type_id')->references('id')->on('tour_types')->onDelete('cascade');
            $table->foreign('start_location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->foreign('nutrition_id')->references('id')->on('nutrition')->onDelete('cascade');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
            $table->foreign('seller_id')->references('id')->on('users')->onDelete('cascade');
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
