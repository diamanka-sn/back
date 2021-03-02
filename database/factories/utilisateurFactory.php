<?php

namespace Database\Factories;

use App\Models\utilisateur;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

class utilisateurFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = utilisateur::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->sentence(6,true),
            'prenom' => $this->faker->sentence(6,true),
            'tel' => $this->faker->unique()->randomNumber($nbDigits = NULL),
            'adresse' => $this->faker->sentence(6,true),
            'photo' => $this->faker->sentence(6,true),
            'login' => $this->faker->unique()->safeEmail,
            'password' => $this->faker->sentence(6,true),
            'profile' => $this->faker->state(new Sequence(
                ['profile' => 'admin'],
                ['profile' => 'client'],
                ['profile' => 'fermier'],
            )),
        ];
    }
}
