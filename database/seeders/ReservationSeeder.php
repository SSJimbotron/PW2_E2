<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reservation::factory()->create([
            "user_id" => "",
            "forfait_id" => "",
            "date_arrivee" => "",
            "date_depart" => "",
        ]);
    }
}
