<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ShopAd;
use Faker\Generator as Faker;

$factory->define(ShopAd::class, function (Faker $faker) {
    return [
        'path'=>$faker->word,
    ];
});
