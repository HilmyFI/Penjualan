<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Barang;
use Faker\Generator as Faker;

$factory->define(Barang::class, function (Faker $faker) {
    return [
        'kode_barang' => $faker->numerify('B###'),
        'kategori_barang' => "kategori barang",
        'nama_barang' => $faker->name,
        'jenis_barang' => "jenis barang",
        'harga_barang' => $faker->randomNumber(5),
    ];
});
