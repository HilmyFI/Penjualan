<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Akun;
use Faker\Generator as Faker;

$factory->define(Akun::class, function (Faker $faker) {
    return [
        'kode_akun' => $faker->numerify('A###'),
        'nama_akun' => $faker->name,
        'tipe_akun' => "tipe akun",
    ];
});