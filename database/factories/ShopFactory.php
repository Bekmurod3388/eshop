<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Shop;
use Faker\Generator as Faker;

$factory->define(Shop::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'uuid' => $faker->uuid,
        'contact_person' => $faker->name,
        'website' => $faker->unique()->website,
        'about_us'=>$faker->nullable()->word,
        'address'=>$faker->address,
        'email'=>$faker->email,
        'phone_number'=>$faker->phone_number,
        'open_days' => $faker->numberBetween(1,100),
        'active_days'=>$faker->numberBetween(1,100),
        'enabled'=>$faker->numberBetween(0,1),
        'auto_deletion'=>$faker->numberBetween(0,1),
        'new_products'=>$faker->numberBetween(0,1),
        'bestsellers'=>$faker->numberBetween(0,1),
        'our_recommendations'=>$faker->numberBetween(0,1),
        'promotions'=>$faker->numberBetween(0,1),
        'client_ad'=>$faker->numberBetween(0,1),
        'eurosoft_ad'=>$faker->numberBetween(0,1),
        'catch_of_day'=>$faker->numberBetween(0,1),
        'price'=>$faker->numberBetween(0,100000),
        'state'=>$faker->numberBetween(0,1),
        'android'=>$faker->numberBetween(0,1),
        'ios'=>$faker->numberBetween(0,1),
        'edited_by'=>$faker->numberBetween(0,1),
    ];
});
