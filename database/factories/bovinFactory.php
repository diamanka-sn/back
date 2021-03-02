<?php

namespace Database\Factories;

use App\Models\bovin;
use Illuminate\Database\Eloquent\Factories\Factory;

class bovinFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = bovin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->sentence(6,true),
            'photo' => $this->faker->sentence(6,true),
            'etatDeSante' => $this->faker->sentence(6,true),
            'geniteur' => $this->faker->sentence(6,true),
            'etat' => $this->faker->sentence(6,true),
            'genitrice' => $this->faker->sentence(6,true),
            'situation' => $this->faker->sentence(6,true),
            'codeBovin'=>$this->faker->sentence(7,true),
            'idRace'=>$this->faker->Str::unique()
           
        ];
    }
}
