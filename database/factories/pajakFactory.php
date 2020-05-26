<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pajak;
use Faker\Generator as Faker;

$factory->define(Pajak::class, function (Faker $faker) {
    return [
        'kode_pajak' => $faker->numerify('P###'),
        'nama_pajak' => $faker->name,
        'pajak' => $faker->randomNumber(2),
    ];
});
