<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    return [
        'sn_employee' => $faker->uuid,
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'jabatan' => 'admin',
        'phone_number' => $faker->phoneNumber,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->state(User::class , 'counter' , ['is_counter' => true]);

$factory->state(User::class , 'sales' , ['is_sales' => true , 'jabatan' => 'sales']);

$factory->state(User::class , 'warehouse' , ['is_warehose' => true , 'jabatan' => 'warehouse']);