<?php

use Illuminate\Database\Seeder;

class pajakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Pajak::class, 5)->create();
    }
}
