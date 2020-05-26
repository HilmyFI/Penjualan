<?php

use Illuminate\Database\Seeder;

class saleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Sale::class, 5)->create();
    }
}
