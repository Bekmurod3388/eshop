<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CompanyAd;
use Faker\Generator as Faker;

$factory->define(CompanyAd::class, function (Faker $faker) {
    return [
        'about_company'=>$faker->word,
        'privacy_policy'=>$faker->word,
        'offer'=>$faker->word,
        'payment_and_delivery'=>$faker->word,
        'exchange_and_return'=>$faker->word,
        'bonus_program'=>$faker->word,
    ];
});
