<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Customer;
use App\Models\PaymentMethod;
use App\Models\Shop;
use Faker\Generator as Faker;

$factory->define(Shop::class, function (Faker $faker) {
    return [
        'purchase_code'=>$faker->numberBetween(1, 1000),
        'shop_id'=>Customer::all()->random()->id,
        'payment_id'=>PaymentMethod::all()->random()->id,
        'state'=>$faker->word,
        'status'=>$faker->word,
        'price'=>$faker->numberBetween(1, 1000000),
        'edited_by'=>$faker->userName,
    ];
});
