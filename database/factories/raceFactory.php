<?php

namespace Database\Factories;

use App\Models\race;
use Illuminate\Database\Eloquent\Factories\Factory;

class raceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = race::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nomRace' => $this->faker->sentence(6,true),
        ];
    }
}
