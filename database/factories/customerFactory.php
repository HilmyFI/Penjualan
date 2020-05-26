<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'kode_customer' => $faker->numerify('CUS###'),
        'nama_customer' => $faker->name,
        'telp_customer' => $faker->phoneNumber,
        'email_customer' => $faker->unique()->safeEmail,  
        'alamat_customer' => $faker->address,
    ];
});
