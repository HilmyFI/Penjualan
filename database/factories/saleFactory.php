<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sale;
use Faker\Generator as Faker;

$factory->define(Sale::class, function (Faker $faker) {
    return [
        'kode_sales' => $faker->numerify('SAL###'),
        'nama_sales' => $faker->name,
        'telp_sales' => $faker->phoneNumber,
        'email_sales' => $faker->unique()->safeEmail,  
    ];
});
