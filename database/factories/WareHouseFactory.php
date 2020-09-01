<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use App\User;
use App\WareHouse;
use Faker\Generator as Faker;

$factory->define(WareHouse::class, function (Faker $faker) {
    return [
        'user_id'       => fn () => factory(User::class)->state('warehouse')->create()->id,
        'customer_id'   => fn () => factory(Customer::class)->create()->id,
        'so'            => rand(2000,3000),
        'od'            => rand(2000,3000),
        'date_gi'       => $faker->date(),
        'cust_recv'     => $faker->firstName,
    ];
});
