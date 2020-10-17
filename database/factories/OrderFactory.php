<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Customer;
use App\Models\DeliveryType;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\PaymentMethod;
use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'order_code' => $faker->numberBetween(1,1000),
        'customer_id' => 1, //Customer::all()->random()->id,
        'product_id' => 1, //Product::all()->random()->id,
        'type_of_delivery_id' => 1, //DeliveryType::all()->random()->id,
        'status_id' => 1, //OrderStatus::all()->random()->id,
        'payment_method_id' => 1, //PaymentMethod::all()->random()->id,
        'amount' => $faker->numberBetween(1,100000),
    ];
});
