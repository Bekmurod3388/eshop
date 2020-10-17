<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Slider;
use Faker\Generator as Faker;

$factory->define(Slider::class, function (Faker $faker) {
    return [
        'slider1'=>$faker->word,
        'slider2'=>$faker->word,
        'slider3'=>$faker->word,
    ];
});
