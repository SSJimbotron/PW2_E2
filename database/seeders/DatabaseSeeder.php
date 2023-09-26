<?php

namespace Database\Seeders;

use App\Models\Actualite;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::factory()->create([
            "prenom" => "Hugo",
            "nom" => "Robert",
            "email" => "admin@hotmail.com",
            "role" => "3"
        ]);
        User::factory()->create([
            "prenom" => "Jimmy",
            "nom" => "Lee",
            "email" => "client@hotmail.com",
            "role" => "1"
        ]);
        User::factory()->create([
            "prenom" => "Wafaa",
            "nom" => "Tamaa",
            "email" => "employe@hotmail.com",
            "role" => "2"
        ]);

        \App\Models\User::factory(10)->create();

        $this->call([ActiviteSeeder::class, ActualiteSeeder::class, ForfaitSeeder::class, ArtisteSeeder::class]);
        \App\Models\Reservation::factory(10)->create();
    }
}
