<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models;
use Faker\Generator as Faker;

$factory->define(Models\Contact::class, function (Faker $faker) {
    return [
        'phone' => $faker->phone_number,
        'email' => $faker->email,
        'address' => $faker->address,
        'open_hours' => $faker->numberBetween(0,23),
        'latitude' => $faker->numberBetween(0,100),
        'longitude' => $faker->numberBetween(0,100),
        'name' => $faker->name,
        'email_client' => $faker->email,
        'web_site' => $faker->word,
        'message' => $faker->word,
    ];
});
