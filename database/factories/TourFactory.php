<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */


use Faker\Generator as Faker;




$factory->define(App\Models\Tour::class, function (Faker $faker) {

    return [
//        'name' => function (array $tour) {
//            return App\Models\Country::find($tour['country_id'])->name;
//        },
        //'name' => $faker->sentence($nbWords = 2),
        'name' => $faker->words($nb = 2, $asText = true),
        'description' => $faker->text($maxNbChars = 500),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 50000),
        'country_id' => $faker->numberBetween($min = 1, $max = 40),
        'main_img_id' => $faker->numberBetween($min = 1, $max = 300),
        'category_id' => $faker->numberBetween($min = 1, $max = 3),
        'tour_type_id' => $faker->numberBetween($min = 1, $max = 11),
        'seller_id' => $faker->numberBetween($min = 1, $max = 40),
        'start_at' => $faker->dateTimeBetween($startDate = '+ 30 days', $endDate = '+ 60 days'),
        'finish_at' => $faker->dateTimeBetween($startDate = '+ 60 days', $endDate = '+ 90 days'),
        'start_location_id' => $faker->numberBetween($min = 1, $max = 100),
        'for_children' =>  $faker->numberBetween($min = 0, $max = 1),
        'recommended'  => $faker->numberBetween($min = 0, $max = 1),
        'hot' => $faker->numberBetween($min = 0, $max = 1),
        'advertisement' => $faker->numberBetween($min = 0, $max = 1),
        'nutrition_id' => $faker->numberBetween($min = 1, $max = 3),
        'hotel_id' => $faker->numberBetween($min = 1, $max = 4),

    ];
});
