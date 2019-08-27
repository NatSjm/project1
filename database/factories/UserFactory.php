<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'first_name'     => $faker->firstName($gender = 'male'),
        'last_name'      => $faker->lastName,
        'phone'          => $faker->phoneNumber,
        'email'          => $faker->unique()->safeEmail,
        'avatar'         => 'profile/' . $faker->image('public/storage/profile', 640, 480, null, false),
        'password'       => bcrypt('password'),
        'remember_token' => $faker->regexify('[A-Za-z0-9]{10}'),
    ];
});
