<?php

use Illuminate\Database\Seeder;

class gudangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Gudang::class, 5)->create();
    }
}
