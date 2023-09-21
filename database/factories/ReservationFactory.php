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
        $date_en_unix = [1724076000, 1724163000, 1724248800,];
        $randomdate = 1724076000;
        $randomforfait = $this->faker->numberBetween(1, 3);
        $randomdate_depart = 1724076000;

        if ($randomforfait == 1) {
            $randomdate = $date_en_unix[$this->faker->numberBetween(0, 2)];
            $randomdate_depart = $randomdate;
        }
        if ($randomforfait == 2) {
            $randomdate = $date_en_unix[$this->faker->numberBetween(0, 2)];
            if ($randomdate == 1724248800) {
                $randomdate = 1724163000;
            }
            if ($randomdate == 1724163000) {
                $randomdate_depart = 1724248800;
            }
            if ($randomdate == 1724076000) {
                $randomdate_depart = 1724163000;
            }
        }
        if ($randomforfait == 3) {
            $randomdate = $date_en_unix[0];
            $randomdate_depart = 1724248800;
        }

        $randomdate = gmdate("Y-m-d", $randomdate);
        $randomdate_depart = gmdate("Y-m-d",  $randomdate_depart);


        return [
            'user_id' => $this->faker->unique()->numberBetween(1, 10), // COMMENT SAVOIR LE NOMBRE DE USER DE FACON VARIABLE???
            "forfait_id" => $randomforfait,
            "date_arrivee" => $randomdate,
            "date_depart" => $randomdate_depart,
        ];
    }
}
