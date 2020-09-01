<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use App\Plant;
use App\Unit;
use Faker\Generator as Faker;

$factory->define(Unit::class, function (Faker $faker) {
    return [
        'plant_id'   => fn() => factory(Plant::class)->create()->id,
        'customer_id'=> fn() => factory(Customer::class)->create()->id,
        'sn_unit'    => $faker->numerify('SNU-') . $faker->unique()->numberBetween(200, 400),
        'model_unit' => $faker->numerify('MU-') . $faker->unique()->numberBetween(200, 400),
        'desc'       => $faker->realText(50),
        'no_unit'    => 'NU-' . rand(200,300),
        'lokasi_unit'=> $faker->address,
        'kota'       => $faker->city,
        'hoo'        => rand(200,300),
        'smu'        => rand(240,300)   

    ];
});
