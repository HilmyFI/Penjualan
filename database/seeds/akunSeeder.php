<?php

use Illuminate\Database\Seeder;

class akunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Akun::class, 5)->create();
    }
}
