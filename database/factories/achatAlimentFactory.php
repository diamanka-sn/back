<?php

namespace Database\Factories;

use App\Models\achatAliment;
use Illuminate\Database\Eloquent\Factories\Factory;

class achatAlimentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = achatAliment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->sentence(6,true),
            'libelle' => $this->faker->sentence(6,true),
            'montant' => $this->faker->randomNumber($min = 6000),
        ];
    }
}
