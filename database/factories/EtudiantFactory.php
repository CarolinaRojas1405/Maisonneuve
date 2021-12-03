<?php

namespace Database\Factories;

use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Database\Eloquent\Factories\Factory;

class EtudiantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Etudiant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'nom' => $this->faker->name(),
            'adresse' => $this->faker->address(),
            'telephone' => $this->faker->phoneNumber(),
            'courriel' => $this->faker->unique()->safeEmail(),
            'date_naissance' => $this->faker->date(),
            'ville_id' => Ville::all()->random()->id,
        ];
    }
}
