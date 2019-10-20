<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */


use Faker\Generator as Faker;

$factory->define(App\Models\Deal::class, function (Faker $faker) {
    $values = [
        $faker->numberBetween($min = 1, $max = 40),
        $faker->unique()->numberBetween($min = 1, $max = 40),
    ];
    return [
        'buyer_id'    => $values[0],
        'seller_id'   => $values[1],
        'total_price' => $faker->numberBetween($min = 20000, $max = 570000),
    ];
});
