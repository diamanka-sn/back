<?php

namespace Database\Factories;

use App\Models\achatBovin;
use Illuminate\Database\Eloquent\Factories\Factory;

class achatBovinFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = achatBovin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'montantBovin' => $this->faker->randomDigit(),
            'dateAchatBovin' => $this->faker->date("y-m-d"),
        ];
    }
}
