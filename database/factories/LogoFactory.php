<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Logo;
use Faker\Generator as Faker;

$factory->define(Logo::class, function (Faker $faker) {
    return [
        'path'=>$faker->word,
        //
    ];
});
