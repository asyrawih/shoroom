<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use App\Unit;
use Faker\Generator as Faker;

$factory->define(Unit::class, function (Faker $faker) {
    return [
        'customer_id'=> fn() => factory(Customer::class)->create()->id,
        'sn_unit'    => $faker->numerify('SNU-') . $faker->unique()->numberBetween(200, 400),
        'model_unit' => $faker->numerify('MU-') . $faker->unique()->numberBetween(200, 400),
        'desc'       => $faker->realText(200),
    ];
});
