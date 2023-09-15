<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->unique()->numberBetween(1, 10), // COMMENT SAVOIR LE NOMBRE DE USER DE FACON VARIABLE???
            "forfait_id" => $this->faker->numberBetween(1, 3),
            "date_arrivee" => $this->faker->dateTimeBetween(04/24/2022, 04/25/2022),
            "date_depart" => $this->faker->dateTimeBetween(04/24/2022, 04/25/2022),
        ];
    }
}
