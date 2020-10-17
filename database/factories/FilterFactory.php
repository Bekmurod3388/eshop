<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Filter;
use App\Models\FilterDescription;
use App\Models\FilterGroup;
use App\Models\FilterGroupDescription;
use Faker\Generator as Faker;

$factory->define(FilterGroupDescription::class, function (Faker $faker) {
    return [
        'name' => $faker->word
    ];
});

$factory->define(FilterDescription::class, function (Faker $faker) {
    return [
        'name' => $faker->word
    ];
});