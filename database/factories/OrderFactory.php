<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */


use Faker\Generator as Faker;

$factory->define(App\Models\Order::class, function (Faker $faker) {
    return [
        'tour_id' => $faker->numberBetween($min = 1, $max = 50),
        'deal_id' => $faker->numberBetween($min = 1, $max = 10),
        'price'  =>  $faker->randomFloat($nbMaxDecimals = 2, $min = 30000, $max = 300000),
    ];
});
