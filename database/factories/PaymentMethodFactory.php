<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\PaymentMethod;
use App\Models\PaymentMethodDescription;
use Faker\Generator as Faker;

$factory->define(PaymentMethod::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
    ];
});

$factory->define(PaymentMethodDescription::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->words(10, true),
        'meta_title' => $faker->words(5, true),
    ];
});
