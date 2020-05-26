<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Gudang;
use Faker\Generator as Faker;

$factory->define(Gudang::class, function (Faker $faker) {
    return [
        'kode_gudang' => $faker->numerify('G###'),
        'nama_gudang' => $faker->name,
        'alamat_gudang' => $faker->address,
        'telp_gudang' => $faker->phoneNumber,
        'email_gudang' => $faker->unique()->safeEmail,  
        'status_gudang' => "status",  
    ];
});
