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
            'nomAliment' => $this->faker->sentence(6,true),
            'quantite' => $this->faker->randomFloat(),
            'montant' => $this->faker->randomDigit(),
        ];
    }
}
