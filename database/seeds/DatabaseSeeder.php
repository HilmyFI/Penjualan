<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            customerSeeder::class,
            barangSeeder::class,
            akunSeeder::class,
            pajakSeeder::class,
            gudangSeeder::class,
            jurnalSeeder::class,
            saleSeeder::class,
        ]);
    }
}
