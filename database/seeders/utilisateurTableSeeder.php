<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class utilisateurTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\utilisateur::factory(100)->create();
    }
}
