<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\ProductDescription;
use App\Models\StockStatus;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'code' => $faker->word,
        'model' => $faker->word,
        'name'=>$faker->word,
        'stock' => $faker->numberBetween(1,1000),
        'image' => $faker->url,
        'stock_status_id' => 1,
        'manufacturer_id' => 1,
        'category_id' => 1, //Category::all()->random()->id,
        'price' => $faker->randomFloat(),
        'standard_price' => $faker->randomFloat(),
        'special_price' => $faker->randomFloat(),
        'actions' => $faker->randomFloat(),
        'minimum' => $faker->numberBetween(1,100),
        'viewed' => $faker->numberBetween(1,100),
        'sort_order' => $faker->numberBetween(1,100),
        'short_description' => $faker->sentence,
        'status' => $faker->numberBetween(1,100),
        'not_exist' => $faker->numberBetween(0,1),
        'promotion' => $faker->numberBetween(0,1),
        'new' => $faker->numberBetween(0,1),
        'free_delivery' => $faker->numberBetween(0,1),
        'sale' => $faker->numberBetween(0,1),
        'visibility' => $faker->numberBetween(0,1),
        'luxury' => $faker->numberBetween(0,1),
        'action' => $faker->numberBetween(0,1),
        'novelty' => $faker->numberBetween(0,1),
        'tip' => $faker->numberBetween(0,1),
        'top' => $faker->numberBetween(0,1),
        'our_recommendation' => $faker->numberBetween(0,1),
        'age' => $faker->numberBetween(0,99999),
    ];
});

$factory->define(ProductDescription::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->words(10, true),
        'meta_title' => $faker->words(5, true),
    ];
});
