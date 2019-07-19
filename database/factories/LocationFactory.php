<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */


use Faker\Generator as Faker;

$factory->define(App\Models\Location::class, function (Faker $faker) {
    return [
        'name' => $faker->streetAddress,
        'description' => $faker->sentence,
        'city_id' => $faker->numberBetween($min = 1, $max = 80),
    ];
});
