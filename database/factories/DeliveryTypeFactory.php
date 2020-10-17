<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\DeliveryType;
use App\Models\DeliveryTypeDescription;
use Faker\Generator as Faker;

$factory->define(DeliveryType::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
    ];
});

$factory->define(DeliveryTypeDescription::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->words(10, true),
        'meta_title' => $faker->words(5, true),
    ];
});
