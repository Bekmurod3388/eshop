<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ShopDetail;
use Faker\Generator as Faker;

$factory->define(ShopDetail::class, function (Faker $faker) {
    return [
        'contact_person' => $faker->name,
        'website' => $faker->unique()->website,
        'about_us'=>$faker->nullable()->word,
        'address'=>$faker->address,
        'email'=>$faker->email,
        'phone_number'=>$faker->phone_number,

    ];
});
