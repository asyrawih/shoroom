<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'sold_to_party'   => $faker->unique()->randomNumber(8),
        'ship_to_id'      => $faker->unique()->randomNumber(8),
        'name'            => $faker->firstNameMale,
        'phone_number'    => $faker->phoneNumber,
        'city'            => $faker->city,
        'virtual_account' => $faker->bankAccountNumber,
        'address'         => $faker->address,
        'info_scc'        => $faker->realText(10),
        'npwp'            => $faker->numberBetween(10000, 30000),
        'ktp'             => $faker->numberBetween(10000, 30000)
    ];
});
