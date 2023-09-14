<?php

namespace Database\Seeders;

use App\Models\Actualite;
use Illuminate\Database\Seeder;

class ActualiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Actualité spécifiques
        Actualite::factory()
            ->create([
                "titre" => "Eric",
                "contenu" => "Gagné",
                "image" => "erga@gmail.com",
            ]);
    }
}
