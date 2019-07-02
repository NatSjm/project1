<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */


use Faker\Generator as Faker;

$factory->define(App\Models\Deal::class, function (Faker $faker) {
    $values = [
        $faker->numberBetween($min = 1, $max = 10),
        $faker->unique()->numberBetween($min = 1, $max = 10),
    ];
    return [
        'buyer_id'    => $values[0],
        'seller_id'   => $values[1],
        'total_price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 50000, $max = 500000),
    ];
});
