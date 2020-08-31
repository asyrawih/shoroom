<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Plant;
use Faker\Generator as Faker;

$factory->define(Plant::class, function (Faker $faker) {
    return [
        'plant' => '1B' . $faker->numberBetween(10, 20),
        'area'  => $faker->country,
        'desc'  => $faker->streetAddress,
    ];
});
