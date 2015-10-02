<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function ($faker) {
    return [
        'name' => 'George Spake',
        'email' => 'gpspake@gmail.com',
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Poster::class, function ($faker) {
    return [
        'title' => $faker->sentence(mt_rand(3, 10)),
        'image' => 'image.jpg',
        'notes' => $faker->sentence(mt_rand(10, 20)),
        'dimension_height' => mt_rand(18, 24),
        'dimension_width' => mt_rand(18, 24),
        'published_at' => $faker->dateTimeBetween('-1 month', '+3 days'),
        'is_draft' => false,
    ];
});