<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Faktur;
use Faker\Generator as Faker;

$factory->define(Faktur::class, function (Faker $faker) {
    return [
        'kode_faktur' => $faker->numerify('FAK###'),
        'tanggal' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'gudang' => "gudang",
        'total_harga' => $faker->randomNumber(5),  
        'diskon' => $faker->randomNumber(5),
        'biaya_lain' => $faker->randomNumber(5),
        'uang_muka' => $faker->randomNumber(5),
    ];
});
