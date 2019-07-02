<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */


use Faker\Generator as Faker;

$factory->define(App\Models\Media::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'path' => $faker->imageUrl($width = 640, $height = 480),
    ];
});
