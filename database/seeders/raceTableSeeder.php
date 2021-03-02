<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class raceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\race::factory(1000)->create();
    }
}
