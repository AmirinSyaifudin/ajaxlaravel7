<?php

use Illuminate\Database\Seeder;

class KatagoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Katagori::class, 10)->create();
    }
}