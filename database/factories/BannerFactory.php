<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Banner;
use App\Models\District;
use Faker\Generator as Faker;

$factory->define(Banner::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'visibility' => $faker->numberBetween(0,1),
    ];
});
