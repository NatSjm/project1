<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */


use Faker\Generator as Faker;

$factory->define(App\Models\Comment::class, function (Faker $faker) {
    return [
       'user_id' => $faker->numberBetween($min = 1, $max = 10),
       'tour_id' => $faker->numberBetween($min = 1, $max = 50),
       'content' => $faker->text,
    ];
});
