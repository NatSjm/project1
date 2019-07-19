<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */


use Faker\Generator as Faker;

$factory->define(App\Models\City::class, function (Faker $faker) {
    return [
        'country_id' => $faker->numberBetween($min = 1, $max = 40),
        'name'       => $faker->city,
    ];
});
