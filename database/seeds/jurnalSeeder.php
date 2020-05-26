<?php

use Illuminate\Database\Seeder;

class jurnalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Jurnal::class, 5)->create();
    }
}
