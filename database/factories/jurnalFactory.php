<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Jurnal;
use Faker\Generator as Faker;

$factory->define(Jurnal::class, function (Faker $faker) {
    return [
        'kode_jurnal' => $faker->numerify('J###'),
        'debit' => $faker->randomNumber(5),
        'kredit' => $faker->randomNumber(5),
    ];
});
