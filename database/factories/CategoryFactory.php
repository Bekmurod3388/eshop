<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'parent_id' => \App\Models\Category::all()->random()->id,
        'sort_order' => $faker->numberBetween(1,100),
    ];
});
