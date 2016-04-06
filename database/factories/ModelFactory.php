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

$factory->define(App\Models\User::class, function (\Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Property::class, function (\Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'latitude' => $faker->randomFloat(6, 41.109688, 41.128504),
        'longitude' => $faker->randomFloat(6, 20.779824, 20.823684),
        'description' => $faker->sentence(),
        'owner_id' => function () {
            return factory(App\Models\User::class)->make()->id;
        },
        'website' => $faker->url,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'rating' => $faker->randomFloat(0, 1, 100),
        'priority' => $faker->randomFloat(0, 1, 100)
    ];
});
