<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use App\Plant;
use App\Proses;
use App\Unit;
use App\User;
use Faker\Generator as Faker;

$factory->define(Proses::class, function (Faker $faker) {
    return [
        'user_id'     => fn () => factory(User::class)->create()->id,
        'customer_id' => fn () => factory(Customer::class)->create()->id,
        'plant_id'    => fn () => factory(Plant::class)->create()->id,
        'no_unit'     => 'NU-' . $faker->numberBetween(30000, 20000),
        'lokasi_unit' => $faker->address,
        'kota'        => $faker->city,
        'hoo'         => $faker->numberBetween(200, 100),
        'smu'         => $faker->numberBetween(200),
        'remark'      => $faker->realText(200),
    ];
});
