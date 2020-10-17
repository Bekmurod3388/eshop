<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Parameter;
use App\Models\ParameterDescription;
use App\Models\Product;
use App\Models\ProductDescription;
use Faker\Generator as Faker;

$factory->define(Parameter::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'value'=>$faker->word,
    ];
});

$factory->define(ParameterDescription::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->words(10, true),
        'meta_title' => $faker->words(5, true),
    ];
});
