<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\OrderStatus;
use Faker\Generator as Faker;

/**
 * @author Bekmurod Khujamuratov
 */
$factory->define(OrderStatus::class, function (Faker $faker) {
    return [
        'status'=>$faker->word,
    ];
});

$factory->define(OrderStatusDescription::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->words(10, true),
        'meta_title' => $faker->words(5, true),
    ];
});
