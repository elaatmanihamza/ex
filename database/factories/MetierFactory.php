<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Metier>
 */
class MetierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => $this->faker->unique()->text(5),
            'libelle' => $this->faker->unique()->text(10),
            //'libelle' => $this->faker->unique()->randomElement(['fa-solid fa-soap', ' fa-brands fa-apple','fa fa-address-book','fa fa-backward']),
        ];
    }
}
