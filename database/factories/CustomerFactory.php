<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Customer;
use App\Models\CustomerDescription;
use App\Models\District;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'username' => $faker->userName,
        'first_name' => $faker->lastName,
        'last_name' => $faker->lastName,
        'phone'=> $faker->phoneNumber,
        'email' => $faker->email,
        'address' => $faker->address,
        'district_id' => 1,
        'birth_date' => $faker->date(),
        'gender' => $faker-> titleMale,
        'password'  => $faker-> password,
    ];
});

$factory->define(CustomerDescription::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->words(10, true),
        'meta_title' => $faker->words(5, true),
    ];
});
