<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\EurosoftAd;
use Faker\Generator as Faker;

$factory->define(EurosoftAd::class, function (Faker $faker) {
    return [
        'path'=>$faker->word,
        //
    ];
});
