<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class bovinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\bovin::factory(1000)->create();
    }
}
