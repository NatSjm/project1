<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */


use Faker\Generator as Faker;

$factory->define(App\Models\Media::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
//        'path' => $faker->image('public/storage/images',640,480, null, false),
            'path' => '9e3de20aaede2255fb050323b484dd5b.jpg',
       // 'path' => $faker->imageUrl($width = 640, $height = 480)->store('uploads', 'public'),
    ];
});
