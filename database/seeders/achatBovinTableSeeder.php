<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class achatBovinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\achatBovin::factory(10)->create();
    }
}
