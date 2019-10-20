<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */


use Faker\Generator as Faker;

$factory->define(App\Models\Order::class, function (Faker $faker) {
    return [
        'tour_id' => $faker->numberBetween($min = 1, $max = 300),
        'deal_id' => $faker->numberBetween($min = 1, $max = 20),
        'price'  => $faker->numberBetween($min = 1, $max = 70000),
        ];
});
