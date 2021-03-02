<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class periodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\periode::factory(1000)->create();
    }
}
